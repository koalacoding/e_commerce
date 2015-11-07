<?php
/*----------------------------------------
------------------------------------------
--------------DELETE PRODUCT--------------
------------------------------------------
----------------------------------------*/

function delete_product($product_id) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

  $request = $bdd->prepare("DELETE FROM products WHERE id=?");
  $request->execute(array($product_id));
  $request->closeCursor();
}

/*------------------------------
--------------------------------
--------------MAIN--------------
--------------------------------
------------------------------*/

require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';
require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

if (isset($_SESSION['email'], $_POST['product_id']) && is_user_admin($_SESSION['email'])
    && is_numeric($_POST['product_id'])) {
  delete_product($_POST['product_id']);
  echo 'ok';
}
