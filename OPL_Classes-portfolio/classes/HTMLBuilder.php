<?php

	class HTMLBuilder
	{
		public $headerpartial;
		public $bodypartial;
		public $footerpartial;

		public $headerTitle;

		public function __construct($header, $body, $footer)
		{
			$this->headerpartial = $header;
			$this->bodypartial = $body;
			$this->footerpartial = $footer;
		}

		protected function buildHeader()
		{
			if( isset( $_GET['contact']) == 1)
			{
				$headerTitle = 'Portfolio contact';
			}
			else
			{
				$headerTitle = 'Portfolio home';
			}

			require 'html/' . $this->headerpartial . '.php';
			$this->buildCssLinks();
		}

		public function buildBody()
		{
			require 'html/' . $this->bodypartial . '.php';
		}

		public function buildFooter()
		{
			require 'html/' . $this->footerpartial . '.php';
			$this->buildJsLinks();
		}

		public function buildAll()
		{
			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}

		private function buildCssLinks()
		{
			$files = $this->findFiles('css', 'css');

			foreach($files as $file)
			{
				foreach ($file as $value)
				{ 
					return '<link rel="stylesheet" type="text.css" href="' . $value . '">';
				}
			}
		}

		private function buildJsLinks()
		{
			$files = $this->findFiles('js', 'js');

			foreach($files as $file)
			{
				foreach($file as $value)
				{
					return '<script src="' . $value . '"></script>';
				}
			}
		}

		private function findFiles($dir, $ext)
		{
			$files = array(glob($dir . '/*' . $ext));

			
//			$mergedFile = $dir . '/merged.'  . $ext;
//			$fp1 = fopen($mergedFile, 'a+');
//
//			foreach($files as $file)
//			{
//				foreach($file as $value)
//				{
//					$mergedFile = fwrite($mergedFile, file_get_contents($value) . '/*' . 
//						$value . ', ' . 
//						strval(filesize($value)) . ', ' . 
//						strval(filectime($value)) . '*/');
//				}
//			}			

			return $files;
		}
	}

?>