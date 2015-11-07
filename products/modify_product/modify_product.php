<?php
/*--------------------------------------
----------------------------------------
--------------MODIFY PRODUCT------------
----------------------------------------
--------------------------------------*/

function modify_product($product) {
  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

  $product['price'] = floatval(str_replace('€', '.', $product['price']));

  $request = $bdd->prepare("UPDATE products SET name=?, mini_description=?, description=?,
                                                image_link=?, price=?, category=? WHERE id=?");
  $request->execute(array($product['name'], $product['mini_description'], $product['description'],
                          $product['image_link'], $product['price'], $product['category'],
                          $product['id']));
  $request->closeCursor();

  return 'ok';
}

/*----------------------------
------------------------------
--------------MAIN------------
------------------------------
----------------------------*/

require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';
require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

if (isset($_SESSION['email'], $_POST['product']) && is_user_admin($_SESSION['email'])) {
  echo modify_product($_POST['product']);
}
