<?php

	// no direct access
	defined('EMONCMS_EXEC') or die('Restricted access');

	function r3ga2_controller()
	{
		global  $session, $route;
		
		$result = false;

		if ($route->action == "view") $result = view("Modules/r3ga2/r3ga2_view.php",array());

		return array('content'=>$result);
		
		 require "Modules/feed/feed_model.php";
    
   	}