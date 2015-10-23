<?php
	/*----------------------------------------------------------
	------------------------------------------------------------
	-----------------CHECK IF PRODUCT ID EXISTS-----------------
	------------------------------------------------------------
	----------------------------------------------------------*/

	function checkIfProductIdExists($productId) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		$request = $bdd->prepare("SELECT 1 FROM products WHERE id=?");
		$request->execute(array($productId));

		if ($request->rowCount() > 0) {
			$request->closeCursor();
			return TRUE;
		}
		
		$request->closeCursor();
		return FALSE;
	}

	/*----------------------------------------------------------
	------------------------------------------------------------
	-----------------ADD PRODUCT IN DB'S BASKET-----------------
	------------------------------------------------------------
	----------------------------------------------------------*/

	function addProductInDbBasket($userEmail, $productId) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';		
		$request = $bdd->prepare("INSERT INTO basket(user, productId) VALUES(?, ?)");
		$request->execute(array($userEmail, $productId));
		$request->closeCursor();

		return 'ok';
	}

	/*---------------------------------------------------------------
	-----------------------------------------------------------------
	-----------------ADD PRODUCT IN SESSION'S BASKET-----------------
	-----------------------------------------------------------------
	---------------------------------------------------------------*/	

	function addProductInSessionBasket($session, $productId) {
		if (!isset($session['basket'])) { // If the user has no basket array in his $_SESSION.
			return array($productId);
		}

		else { // If the user has already a basket array in his $_SESSION.
			array_push($session['basket'], $productId);
			return $session['basket'];
		}
	}

	/*------------------------------------
	--------------------------------------
	-----------------MAIN-----------------
	--------------------------------------
	------------------------------------*/

	if (isset($_POST['productId']) && checkIfProductIdExists($_POST['productId']) == TRUE) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');
		if (isset($_SESSION['email'])) { // If the user is connected.
			echo addProductInDbBasket($_SESSION['email'], $_POST['productId']);
		}

		else { // If the user is not connected.
			$_SESSION['basket'] = addProductInSessionBasket($_SESSION, $_POST['productId']);
			echo 'ok';
		}
	}