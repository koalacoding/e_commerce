<?php

	/*-----------------------------------------------------------------------
	-------------------------------------------------------------------------
	-----------------CHECK IF THE SPORT IS ALREADY IN THE DB-----------------
	-------------------------------------------------------------------------
	-----------------------------------------------------------------------*/


	function check_if_sport_already_in_db($bdd, $sport_name) {
		$request = $bdd->prepare("SELECT name FROM sports WHERE name=?");
		$request->execute(array($sport_name));

		if ($request->rowCount() > 0) { // If the sport is already in the database.
			$request->closeCursor();
			return TRUE;
		}

		$request->closeCursor();
		return FALSE;
	}

	/*-----------------------------------------------------------------------
	-------------------------------------------------------------------------
	-------------------------ADD NEW SPORT IN THE DB-------------------------
	-------------------------------------------------------------------------
	-----------------------------------------------------------------------*/

	function add_new_sport($bdd, $sport_name) {
		$request = $bdd->prepare ('INSERT INTO sports(name) VALUES(?)');
		$request->execute(array($sport_name));
		$request->closeCursor();
	}