<?php
	/*---------------------------------------------------------------
	-----------------------------------------------------------------
	------------------INSERT NEW ELEMENT IN THE DB-------------------
	-----------------------------------------------------------------
	---------------------------------------------------------------*/

	function insert_element_in_db($bdd, $element_name) {
		$request = $bdd->prepare ('INSERT INTO accueil_menu(element_name) VALUES(?)');
		$request->execute(array($element_name));
		$request->closeCursor();
	}