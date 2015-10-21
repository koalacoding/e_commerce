<?php
  /*--------------------------------------------------
  ----------------------------------------------------
  ---------------CHECK IF USER IS ADMIN---------------
  ----------------------------------------------------
  --------------------------------------------------*/

  function is_user_admin($email) {
    require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
    $request = $bdd->prepare("SELECT user_is_admin FROM users WHERE email=?");
    $request->execute(array($email));
    $fetch = $request->fetch();
    $request->closeCursor();

    return $fetch['user_is_admin'];
  }

  /*---------------------------------------------------------
  -----------------------------------------------------------
  ---------------REDIRECT IF USER IS NOT ADMIN---------------
  -----------------------------------------------------------
  ---------------------------------------------------------*/

  function redirect_if_user_not_admin($email) { // Redirect to /e_commerce/index.php.
    if (!is_user_admin($email)) {
      header('Location: /e_commerce/index.php');
      die();    
    }      
  }  

