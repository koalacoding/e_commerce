<?php
/*-----------------------------------------
-------------------------------------------
--------------SHOW NEW PRODUCTS------------
-------------------------------------------
-----------------------------------------*/

function show_new_products() {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/products/common_functions.php';

  $request = $bdd->query("SELECT * FROM products ORDER BY id DESC LIMIT 3");

  echo '<div id="core_core">
          <div id="show_new_products_title">NOUVEAUTÉS</div>
          <hr width="85%" style="opacity: 0.3; float: right; margin-top: 2.3%;
                                 margin-right: 10px;">

          <div id="show_new_products_wrapper">';

  while ($fetch = $request->fetch()) {
    echo '<div id="'.$fetch['id'].'" class="show_new_products_product">
            <div class="show_new_products_product_image">
              <img src="'.$fetch['image_link'].'" width="200" height="200">
            </div>

            <div class="show_new_products_product_name">'
               .$fetch['name'].
           '</div>

           <div class="show_new_products_product_mini_description">'
             .substr($fetch['mini_description'], 0, 150).
           '</div>

           <div class="show_new_products_product_price">'
             .putEuroSymbolandSupTagDecimals($fetch['price']).
           '</div>
          </div>';
  }

  echo '  </div>
        </div>';
}

/*----------------------------
------------------------------
--------------MAIN------------
------------------------------
----------------------------*/

show_new_products();
