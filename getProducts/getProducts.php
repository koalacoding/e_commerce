<?php
	/*--------------------------------------------------------------------
	----------------------------------------------------------------------
	-----------------PUT EURO SYMBOL AND SUP TAG DECIMALS-----------------
	----------------------------------------------------------------------
	--------------------------------------------------------------------*/

	/* Replace the point of a number string by an euro symbol,
     and put all the decimals between <sup> tags. */
	function putEuroSymbolandSupTagDecimals($number) {
		$number = strval($number); // Convert to string.

		if (strpos($number,'.')) { // If the number is a float (i.e. contains a point).
			// Replace the point by an € and put the <sup> tags.
			return str_replace(".", "€<sup>", $number).'</sup>';
		}

 		// Return the number without any modification (except that we transformed it into a string).
		return $number.'€';
	}

	/*--------------------------------------------
	----------------------------------------------
	-----------------GET PRODUCTS-----------------
	----------------------------------------------
	--------------------------------------------*/

	function getProducts($menu) {
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

			echo '<div class="product '.$backgroundColor.'Product" id="'.$fetch['id'].'">
							<div class="productLeftFloater">
							  <div class="productName">'.$fetch['name'].'</div>
							  <div class="productDescription">'.$fetch['description'].'</div>
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
	  getProducts($_POST['menu']);
	}
