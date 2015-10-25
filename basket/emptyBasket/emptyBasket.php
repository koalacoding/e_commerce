<?php
	/*-------------------------------------------
	---------------------------------------------
	-----------------EMPTY BASKET----------------
	---------------------------------------------
	-------------------------------------------*/


	  /*-------------------------
	  -------EMPTY DB BASKET-----
	  -------------------------*/

		// Empty a basket stored in the DB (i.e. the basket of a registered user).
	  function emptyDbBasket($userEmail) {
	  	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
	  	$request = $bdd->prepare("DELETE FROM basket WHERE user=?");
	  	$request->execute(array($userEmail));
	  	$request->closeCursor();
	  }


	/*-----------------------------------
	-------------------------------------
	-----------------MAIN----------------
	-------------------------------------
	-----------------------------------*/

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_SESSION['email'])) { // If the user is connected.
		emptyDbBasket($_SESSION['email']);
	}

	else if (isset($_SESSION)) {
		$_SESSION['basket'] = NULL;
	}

	else {
		echo 'Erreur.';
	}