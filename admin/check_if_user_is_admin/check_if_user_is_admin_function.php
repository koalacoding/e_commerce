<?php

  /*--------------------------------------------------
  ----------------------------------------------------
  ---------------CHECK IF USER IS ADMIN---------------
  ----------------------------------------------------
  --------------------------------------------------*/

  function is_user_admin ($bdd, $username) {
    $request = $bdd->prepare("SELECT is_admin FROM users WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    if ($fetch['is_admin'] == 1) { // If the user is admin.
      return TRUE;
    }

    return FALSE;
  }