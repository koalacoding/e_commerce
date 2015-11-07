<?php
/*----------------------------------------------------
------------------------------------------------------
-----------------SHOW PRODUCT DETAILS-----------------
------------------------------------------------------
----------------------------------------------------*/

function show_product_details($product_id, $session) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/products/common_functions.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

  $request = $bdd->prepare("SELECT * FROM products WHERE id=?");
  $request->execute(array($product_id));
  $fetch = $request->fetch();
  $request->closeCursor();

  echo '<div id="core_core">
          <div id="product_details">
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
              <br />
              <button id="product_details_add_to_basket_button">Ajouter au panier</button>
              <br />
              <br />';
              show_delete_product_button_if_user_is_admin($session, $fetch['id']);
        echo '<div id="dialog-confirm"><p></p></div>
              </div>
          </div>
        </div>';
}


  /*-------------------------------------------------------------
  ----------SHOW DELETE PRODUCT BUTTON IF USER IS ADMIN----------
  -------------------------------------------------------------*/

  function show_delete_product_button_if_user_is_admin($session, $productId) {
    require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

    // If the user is connected, and if he is an admin.
    if (isset($session['email']) && is_user_admin($session['email'])) {
      echo '<button id="'.$productId.'" class="product_details_delete_product_button">
              Supprimer produit
            </button>';
    }
  }


/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';

if (isset($_POST['product_id'])) {
  show_product_details($_POST['product_id'], $_SESSION);
}
