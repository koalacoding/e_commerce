<?php
/*----------------------------------------------
------------------------------------------------
-----------------SEARCH PRODUCTS----------------
------------------------------------------------
----------------------------------------------*/

function search_products($string) { // Search products in the DB containing a specific string.
  $array = array();

  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
  $request = $bdd->prepare("SELECT id, name FROM products WHERE name LIKE ?");
  $request->execute(array('%'.$string.'%'));
  while ($fetch = $request->fetch()) {
    array_push($array, array($fetch['id'], $fetch['name']));
  }

  return $array;
}

/*-----------------------------------
-------------------------------------
-----------------MAIN----------------
-------------------------------------
-----------------------------------*/

if (isset($_POST['string'])) {
  echo json_encode(search_products($_POST['string']));
}
