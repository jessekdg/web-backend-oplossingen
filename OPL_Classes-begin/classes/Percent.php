<?php

	class Percent
	{
		public $relative;
		public $hundred;
		public $nominal;

		public function formatNumber($number)
		{
			return number_format($number, 2);
		}

		public function __construct($new, $unit)
		{
			$this->relative = $this->formatNumber($new / $unit);
			$this->hundred = $this->relative * 100;

			if($this->relative > 1)
			{
				$this->nominal = 'positive';
			}
			elseif($this->relative == 1)
			{
				$this->nominal = 'status-quo';
			}
			else
			{
				$this->nominal = 'negative';
			}
		}
	}

?>