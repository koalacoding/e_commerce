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

    if ($fetch['user_is_admin'] == 1) { // If the user is admin.
      return TRUE;
    }

    return FALSE;
  }