<?php

	class HTMLBuilder
	{
		public $headerpartial;
		public $bodypartial;
		public $footerpartial;

		public function __construct($header, $body, $footer)
		{
			$this->headerpartial = $header;
			$this->bodypartial = $body;
			$this->footerpartial = $footer;
		}

		protected function buildHeader()
		{
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
			return $files;
		}

		protected function getIfGetIsSet()
		{
			if($_GET)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

?>