<?php
	/*------------------------------------------------------------------------------------------------
	--------------------------------------------------------------------------------------------------
	-----------------COUNT THE NUMBER OF PRODUCTS IN THE BASKET OF NOT CONNECTED USER-----------------
	--------------------------------------------------------------------------------------------------
	------------------------------------------------------------------------------------------------*/

	// Count the number of products in the basket of a non logged in user.
	function countNbOfProductsInBasketNotConnected($session) {
		if (isset($session['basket'])) {
			return count($session['basket']);
		}

		return 0; // If the user has no basket array set in his $_SESSION.
	}

	/*--------------------------------------------------------------------------------------------
	----------------------------------------------------------------------------------------------
	-----------------COUNT THE NUMBER OF PRODUCTS IN THE BASKET OF CONNECTED USER-----------------
	----------------------------------------------------------------------------------------------
	--------------------------------------------------------------------------------------------*/

	// Count the number of products in the basket of a logged in user.
	function countNbOfProductsInBasketConnected($userEmail) {
		require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		$request = $bdd->prepare("SELECT 1 FROM basket WHERE user=?");
		$request->execute(array($userEmail));
		$nbOfProducts = $request->rowCount();
		$request->closeCursor();

		return $nbOfProducts;
	}

	/*-------------------------------------------------------------------------------------
	---------------------------------------------------------------------------------------
	-----------------RETURN NUMBER OF PRODUCTS IN BASKET AND HANDLE PLURAL-----------------
	---------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------*/

	// Function to add a 's' at 'article' if there is more than 1 product in the basket.
	function returnNbOfProductsInBasketAndHandlePlural($nbOfProductsInBasket) {
		if ($nbOfProductsInBasket > 1) {
			return $nbOfProductsInBasket . ' articles';
		}

		return $nbOfProductsInBasket . ' article';
	}	

	/*------------------------------------
	--------------------------------------
	-----------------MAIN-----------------
	--------------------------------------
	------------------------------------*/

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_SESSION['email'])) { // If the user is connected.
		echo returnNbOfProductsInBasketAndHandlePlural(countNbOfProductsInBasketConnected($_SESSION['email']));
	}

	else if (isset($_SESSION)) { // If the user is not connected.
		echo returnNbOfProductsInBasketAndHandlePlural(countNbOfProductsInBasketNotConnected($_SESSION));
	}