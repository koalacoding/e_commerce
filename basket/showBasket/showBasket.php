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

			echo '<div class="basket_product">
					  	<div class="basket_product_name">'.$productDetails['name'].'</div>

							<div class="basket_product_right_floater">
					  		<div class="basket_product_price">'.$productDetails['price']. '€</div>
						 		<div class="basket_product_quantity">'.$productQuantity.'</div>
						 		<div class="basket_product_total">'
						 			.$productDetails['price'] * $productQuantity.
						 		'€</div>
						  	<div class="delete_product_from_basket_logo">
							  	<img id="'.$productDetails['id'].'" class="delete_basket_product"
											 src="http://media.ldlc.com/v3/img/panier/ico-supprimer.png" width="15" height="15">
						 		</div>
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

					<div id="dialog-confirm" style="display: none;">
	  				<p>
							<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
							Tous les produits de votre panier seront supprimés. Êtes-vous sûr ?
						</p>
					</div>

					<div id="emptyBasketButton">
						<div id="emptyBasketButtonLogo">
							<img src="http://media.ldlc.com/v3/img/panier/ico-vider.gif">
						</div>
						<span>vider le panier</span>
					</div>

					<div id="products_titles">
						<span style="margin-left: 10%;">nom</span>
						<span style="margin-left: 55%;">prix</span>
						<span style="margin-left: 4%;">quantité</span>
						<span style="margin-left: 4%;">total</span>
					</div>
					<hr width="100%" style="opacity: 0.3;">';

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

	if (isset($_SESSION['email'])) { // User is connected.
		echo showDbBasket($_SESSION['email']);
	}

	else if (isset($_SESSION)) {
		echo showSessionBasket($_SESSION);
	}
