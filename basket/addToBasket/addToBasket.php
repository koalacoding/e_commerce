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


	/*------------------------------------------------------------------
	--------------------------------------------------------------------
	-----------------DOES USER HAVE PRODUCT IN BASKET ?-----------------
	--------------------------------------------------------------------
	------------------------------------------------------------------*/


      /*--------------------------------------------------
      -------QUANTITY OF PRODUCT CONNECTED USER HAVE------
      --------------------------------------------------*/

			function doesUserHaveProductInDbBasket($userEmail, $productId) {
				require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
				$request = $bdd->prepare("SELECT * FROM basket WHERE user=? AND productId=?");
				$request->execute(array($userEmail, $productId));
				$quantity = $request->rowCount();
				$request->closeCursor();

				if ($quantity > 0) {
					return TRUE;
				}

				return FALSE;
			}

      /*-----------------------------------------------------
      -------DOES USER HAVE PRODUCT IN SESSION BASKET ?------
      -----------------------------------------------------*/

			function doesUserHaveProductInSessionBasket($session, $productId) {
				if (isset($session['basket'])) {
					for ($i = 0; $i < count($session['basket']); $i++) {
						// If the productId has been found in the user's basket.
						if ($session['basket'][$i][0] == $productId) {
							return TRUE;
						}
					}

					return FALSE; // If the productId has not been found in the user's basket.
				}

				else { // The user has no basket set in his $_SESSION.
					return FALSE;
				}
			}


	/*----------------------------------------------------------------------
	------------------------------------------------------------------------
	-----------------UPDATE PRODUCT QUANTITY IN USER BASKET-----------------
	------------------------------------------------------------------------
	----------------------------------------------------------------------*/


    /*-----------------------------------------------
    -------UPDATE PRODUCT QUANTITY IN DB BASKET------
    -----------------------------------------------*/

    function updateProductQuantityInDbBasket($userEmail, $productId, $quantity) {
    	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
    	$request = $bdd->prepare("SELECT quantity FROM basket WHERE user=? AND productId=?");
    	$request->execute(array($userEmail, $productId));
    	$fetch = $request->fetch();
    	 // Quantity the user wants to add + quantity already in his basket.
    	$quantity += $fetch['quantity'];
    	$request->closeCursor();

    	// Adding the total quantity to the DB.
    	$request = $bdd->prepare("UPDATE basket SET quantity=? WHERE user=? AND productId=?");
    	$request->execute(array($quantity, $userEmail, $productId));
    	$request->closeCursor();
    }

    /*----------------------------------------------------
    -------UPDATE PRODUCT QUANTITY IN SESSION BASKET------
    ----------------------------------------------------*/

    function updateProductQuantityInSessionBasket($sessionBasket, $productId, $quantity) {
    	for ($i = 0; $i < count($sessionBasket); $i++) {
    		// When the function finds the productId case.
    		if ($sessionBasket[$i][0] == $productId) {
    			$sessionBasket[$i][1] += $quantity; // We the additional quantity of product.
    		}
    	}

    	return $sessionBasket;
    }


	/*-----------------------------------------------------
	-------------------------------------------------------
	-----------------ADD PRODUCT IN BASKET-----------------
	-------------------------------------------------------
	-----------------------------------------------------*/


    /*-----------------------------------
    -------ADD PRODUCT IN DB BASKET------
    -----------------------------------*/

    // Connected users use the DB basket.
		function addProductInDbBasket($userEmail, $productId, $quantity) {
			// If the user has already the product in his basket.
			if (doesUserHaveProductInDbBasket($userEmail, $productId) == TRUE) {
				updateProductQuantityInDbBasket($userEmail, $productId, $quantity);
				return 'ok';
			}

			require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
			$request = $bdd->prepare("INSERT INTO basket(user, productId, quantity) VALUES(?, ?, ?)");
			$request->execute(array($userEmail, $productId, $quantity));
			$request->closeCursor();

			return 'ok';
		}

    /*----------------------------------------
    -------ADD PRODUCT IN SESSION BASKET------
    ----------------------------------------*/

		function addProductInSessionBasket($session, $productId, $quantity) {
			if (!isset($session['basket'])) { // If the user has no basket array in his $_SESSION.
				return array(array($productId, $quantity));
			}

			else { // If the user has already a basket array in his $_SESSION.
				// If the user has already the product in his basket.
				if (doesUserHaveProductInSessionBasket($session, $productId) == TRUE) {
					 return updateProductQuantityInSessionBasket($session['basket'], $productId, $quantity);
				}

				array_push($session['basket'], array($productId, $quantity));
				return $session['basket'];
			}
		}

	/*------------------------------------
	--------------------------------------
	-----------------MAIN-----------------
	--------------------------------------
	------------------------------------*/

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_POST['productId']) && isset($_POST['quantity'])
			&& checkIfProductIdExists($_POST['productId']) == TRUE) {
		if (isset($_SESSION['email'])) { // If the user is connected.
			echo addProductInDbBasket($_SESSION['email'], $_POST['productId'], $_POST['quantity']);
		}

		else { // If the user is not connected.
			$_SESSION['basket'] = addProductInSessionBasket($_SESSION, $_POST['productId'],
																											$_POST['quantity']);
			echo 'ok';
		}
	}
