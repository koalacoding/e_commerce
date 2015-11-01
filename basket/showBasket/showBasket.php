<?php
	/*-------------------------------------------------------
	---------------------------------------------------------
	-----------------RETRIEVE BASKET PRODUCTS----------------
	---------------------------------------------------------
	-------------------------------------------------------*/

	/* Will retrieve all the products details from the DB.
	   $productsIds is an array containing the ID of the products the user has in his basket. */
	function retrieveBasketProducts($productsIdAndQuantity) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		for ($i = 0; $i < count($productsIdAndQuantity); $i++) {
			// Getting the details of the product (name, price).
			$request = $bdd->prepare("SELECT * FROM products WHERE id=?");
			$request->execute(array($productsIdAndQuantity[$i][0]));
			$productDetails = $request->fetch();
			$request->closeCursor();

			$productQuantity = $productsIdAndQuantity[$i][1];

			echo '<div class="basketProduct">
					  	<div class="basketProductName">'.$productDetails['name'].'</div>
				  		<div class="basketProductPrice">'.$productDetails['price']. '€</div>
					 		<div class="basketProductQuantity">'.$productQuantity.'</div>
					 		<div class="basketProductTotal">'
					 			.$productDetails['price'] * $productQuantity.
					 		'€</div>
					  	<div class="deleteProductFromBasketLogo">
						  	<img id="'.$productDetails['id'].'" class="deleteBasketProduct"
										 src="http://media.ldlc.com/v3/img/panier/ico-supprimer.png" width="15" height="15">
					 		</div>
					  </div>

					  <hr width="100%" style="opacity: 0.3;">';
		}

		echo '</div>'; // Closing #coreCoreBasket.
	}


	/*------------------------------------------
	--------------------------------------------
	-----------------SHOW BASKET----------------
	--------------------------------------------
	------------------------------------------*/


	  /*-----------------------------------
	  -------SHOW NOT CONNECTED BASKET-----
	  -----------------------------------*/

		function showSessionBasket($session) {
			if (isset($session['basket'])) {
				retrieveBasketProducts($session['basket']);
			}
		}

	  /*-------------------------------
	  -------SHOW CONNECTED BASKET-----
	  -------------------------------*/

		function showDbBasket($userEmail) {
			require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
			$request = $bdd->prepare("SELECT products.id, basket.quantity FROM products INNER JOIN basket
																ON products.id = basket.productId WHERE basket.user=?");
			$request->execute(array($userEmail));

			 // In this array we will push the id + quantity of every product the user has in his basket.
			$productsIdAndQuantity = array();
			while ($fetch = $request->fetch()) {
				array_push($productsIdAndQuantity, array($fetch['id'], $fetch['quantity']));
			}

			$request->closeCursor();

			retrieveBasketProducts($productsIdAndQuantity);
		}


	/*-----------------------------------
	-------------------------------------
	-----------------MAIN----------------
	-------------------------------------
	-----------------------------------*/

	// Head of the coreCore.
	echo '<div id="coreCoreBasket">
					<span id="basketTitle">VOTRE PANIER :</span>
					<hr width="85%" style="opacity: 0.3; float: right; margin-top: 2.3%;">

					<div id="emptyBasketButton">
						<div id="emptyBasketButtonLogo">
							<img src="http://media.ldlc.com/v3/img/panier/ico-vider.gif">
						</div>
						<span>vider le panier</span>
					</div>

					<div id="productsTitles">
						<span style="margin-left: 10%;">nom</span>
						<span style="margin-left: 55%;">prix</span>
						<span style="margin-left: 6%;">quantité</span>
						<span style="margin-left: 6%;">total</span>
					</div>';

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_SESSION['email'])) { // User is connected.
		echo showDbBasket($_SESSION['email']);
	}

	else if (isset($_SESSION)) {
		echo showSessionBasket($_SESSION);
	}
