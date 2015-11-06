<?php
/*----------------------------------------------------
------------------------------------------------------
-----------------DELETE BASKET PRODUCT----------------
------------------------------------------------------
----------------------------------------------------*/


  /*-----------------------------------
  -------DELETE DB BASKET PRODUCT------
  -----------------------------------*/

  function delete_db_basket_product($userEmail, $productId) {
  	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
  	$request = $bdd->prepare("DELETE FROM basket WHERE user=? AND productId=?");
  	$request->execute(array($userEmail, $productId));
  	$request->closeCursor();
  }

  /*----------------------------------------
  -------DELETE SESSION BASKET PRODUCT------
  ----------------------------------------*/

  function delete_session_basket_product($basket, $productId) {
  	for ($i = 0; $i < count($basket); $i++) {
      if ($basket[$i][0] == $productId) {
        unset($basket[$i]);
        $basket = array_values($basket);
      }
    }

    return $basket;
  }


/*-----------------------------------
-------------------------------------
-----------------MAIN----------------
-------------------------------------
-----------------------------------*/

require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

if (isset($_POST['productId'])) {
  if (isset($_SESSION['email'])) { // If the user is connected.
  	delete_db_basket_product($_SESSION['email'], $_POST['productId']);
  }

  else if (isset($_SESSION['basket'])) {
  	$_SESSION['basket'] = delete_session_basket_product($_SESSION['basket'], $_POST['productId']);
  }
}

else {
	echo 'Erreur';
}
