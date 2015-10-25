<?php
	/*-----------------------------------------------------------
	-------------------------------------------------------------
	-----------------CALCULATE DB'S BASKET PRICE-----------------
	-------------------------------------------------------------
	-----------------------------------------------------------*/

	// Logged in users use the DB basket.
	function calculateDbBasketPrice($userEmail) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		$request = $bdd->prepare("SELECT products.price, basket.quantity FROM products
															INNER JOIN basket ON products.id = basket.productId
															WHERE basket.user=?");
		$request->execute(array($userEmail));

		$basketPrice = 0;
		while ($fetch = $request->fetch()) {
			$basketPrice += ($fetch['price'] * $fetch['quantity']);
		}

		$request->closeCursor();

		return $basketPrice;
	}

	/*----------------------------------------------------------------
	------------------------------------------------------------------
	-----------------CALCULATE SESSION'S BASKET PRICE-----------------
	------------------------------------------------------------------
	----------------------------------------------------------------*/	

	function calculateSessionBasketPrice($session) { // Non-logged users use the $_SESSION basket.
		if (!isset($session['basket'])) { // If the user has no basket array in his $_SESSION.
			return 0;
		}

		else { // If the user has a basket array set in his $_SESSION.
			require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

			$basketPrice = 0;

			// Getting the price of each product in the basket array.
			foreach ($session['basket'] as $productArray) {
				$request = $bdd->prepare("SELECT price FROM products WHERE id=?");
				$request->execute(array($productArray[0]));
				$fetch = $request->fetch();
				$basketPrice += $fetch['price'] * $productArray[1];
				$request->closeCursor();
			}

			return $basketPrice;
		}
	}

	/*------------------------------------
	--------------------------------------
	-----------------MAIN-----------------
	--------------------------------------
	------------------------------------*/
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_SESSION['email'])) { // If the user is logged in.
		echo calculateDbBasketPrice($_SESSION['email']);
	}

	else { // If the user is not logged in.
		echo calculateSessionBasketPrice($_SESSION);
	}