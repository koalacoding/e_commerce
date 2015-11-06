<?php
/*----------------------------------------------------
------------------------------------------------------
-----------------SHOW PRODUCT DETAILS-----------------
------------------------------------------------------
----------------------------------------------------*/

function show_product_details($product_id) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/products/common_functions.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

	$request = $bdd->prepare("SELECT * FROM products WHERE id=?");
	$request->execute(array($product_id));
  $fetch = $request->fetch();
  $request->closeCursor();

	echo '<div id="product_details">
          <span id="product_details_id" style="display: none">'.$fetch['id'].'</span>
          <div id="product_details_left_floater">
            <div id="product_details_name">'.$fetch['name'].'</div>
    				<div id="product_details_mini_description">'.$fetch['mini_description'].'</div>

            <div id="product_details_image"><img src="'.$fetch['image_link'].'" /></div>
            <div id="product_details_description">'.$fetch['description'].'</div>
            <hr>
          </div>

          <div id="product_details_right_floater">
    				<div id="product_details_price">'
              .putEuroSymbolandSupTagDecimals($fetch['price']).
            '</div>
            <hr>
            <div id="product_details_add_to_basket_quantity">
              <span>Quantité :</span>
              <input class="productQuantitySpinnerInput" value="1">
            </div>
            <button id="product_details_add_to_basket_button">Ajouter au panier</button>
          </div>
        </div>';
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

if (isset($_POST['product_id'])) {
  show_product_details($_POST['product_id']);
}
