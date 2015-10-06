<?php

	if (isset($_POST['sport_name'])) {
		include_once ('../sql/sql_connexion.php');
		include_once ('add_sport_functions.php');

		// If the sport is not already in the DB.
		if (!check_if_sport_already_in_db($bdd, $_POST['sport_name'])) {
			add_new_sport($bdd, $_POST['sport_name']); // We add it in the DB.
		}

		else { // If the sport is already in the DB.

		}

		header("url=add_sport.php");
   		die();
	}

	else {
		echo '<center>You must enter a sport name.</center>';
		header("refresh:2;url=add_sport.php");
		die();
	}