<?php
/*--------------------------------------------------
----------------------------------------------------
-----------------SHOW PRODUCTS LIST-----------------
----------------------------------------------------
--------------------------------------------------*/

function show_products_list($menu) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/products/common_functions.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

	$request = $bdd->prepare("SELECT * FROM products WHERE category=?");
	$request->execute(array($menu));

	// $i will be used with modulo to put an alternate grey/white background to the product divs.
	$i = 0;
	$backgroundColor = '';

	while ($fetch = $request->fetch()) {
		/* If $i is pair, the background color of the product will be grey.
		   Otherwise, it will be white. */
		($i % 2 == 0) ? $backgroundColor = 'grey' : $backgroundColor = 'white';

		if (strlen($fetch['mini_description']) > 150) { // If the description is longer than 78 characters.
			// We only keep its first 78 characters.
			$fetch['mini_description'] = substr($fetch['mini_description'], 0, 150) . ' ...';
		}

		echo '<div class="product '.$backgroundColor.'Product" id="'.$fetch['id'].'">
						<div class="productLeftFloater">
							<div class="product_image">
								<img src="'.$fetch['image_link'].'" />
							</div>

							<div class="product_left_floater_right_floater">
								<div class="productName">'.$fetch['name'].'</div>
							  <div class="productDescription">'.$fetch['mini_description'].'</div>
							</div>
						</div>

					  <div class="productRightFloater">
						  <div class="productPrice">'.putEuroSymbolandSupTagDecimals($fetch['price']).'</div>
						  <div class="addToBasket">
						  	<img src="http://image.noelshack.com/fichiers/2015/43/1445621396-addtobasket.png" />
						  </div>
						  <div class="productQuantitySpinner">
						  	<input class="productQuantitySpinnerInput" value="1">
						  </div>
					  </div>
					</div>';

		$i++;
	}

	$request->closeCursor();
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

if (isset($_POST['menu'])) {
  show_products_list($_POST['menu']);
}
