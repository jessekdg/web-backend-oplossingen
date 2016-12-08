<?php

	class Home extends HTMLBuilder
	{
		if(parent::getIfGetIsSet())
		{
			if( !isset($_GET['contact']) == 1)
			{
				/* contact pagina */
			}
			else
			{
				/* home pagina */
			}
		}
	}

?>