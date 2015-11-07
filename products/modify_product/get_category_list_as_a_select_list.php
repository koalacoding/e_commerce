<?php
/*----------------------------------------------------------
------------------------------------------------------------
--------------GET CATEGORY LIST AS A SELECT LIST------------
------------------------------------------------------------
----------------------------------------------------------*/

// $product_category contains the category of the product currently shown in show_product_details.
function get_category_list_as_a_select_list($product_category) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

  $product_category = strtolower($product_category);
  
  $request = $bdd->query("SELECT name FROM menu");

  $selected = '';
  echo '<select>';
  while ($fetch = $request->fetch()) {
    // If the currently fetched category is the same as the shown product's category.
    if ($fetch['name'] == $product_category) $selected = 'selected';
    else $selected = '';

    echo '<option value="'.$fetch['name'].'" '.$selected.'>'.$fetch['name'].'</option>';
  }
  echo '</select>';

  $request->closeCursor();
}

/*----------------------------
------------------------------
--------------MAIN------------
------------------------------
----------------------------*/

require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';
require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

if (isset($_SESSION['email'], $_POST['product_category']) && is_user_admin($_SESSION['email'])) {
  get_category_list_as_a_select_list($_POST['product_category']);
}
