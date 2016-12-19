<?php

	class Message
	{
		public function createMessage($message)
		{
			$_SESSION['message'] = $message;
		}

		public function showMessage()
		{
			if (isset( $_SESSION['message'] ))
			{
				return $_SESSION['message'];
				unset( $_SESSION['message'] );
			}
			else
			{
				return false;
			}
		}
	}

?>