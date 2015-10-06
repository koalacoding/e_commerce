<?php
  /*----------------------------------------
  ------------------------------------------
  ---------------SHOW BUTTONS---------------
  ------------------------------------------
  ----------------------------------------*/


  /*------------------------------
  ------SHOW CONNECTED BUTTONS----
  ------------------------------*/

  function show_connected_buttons($username) {
    echo
      '<a href="manage_blog/manage_blog.php" class="button">Manage your account</a>
        <a href="deposit.php" class="button">Deposit</a>
        <a href="login/logout.php" class="button right_button2">Logout</a>';
  }

  /*------------------------------
  ---SHOW NOT CONNECTED BUTTONS---
  ------------------------------*/

  function show_not_connected_buttons() {
    echo
    '<div id="not_registred"></div>
      <a href="login/login.php" class="button">Login</a>
      <a href="register/register.php" class="button right_button2">Register</a>';
  }


  /*--------------------------------------------------
  ----------------------------------------------------
  ---------------SHOW LOGIN AND BALANCE---------------
  ----------------------------------------------------
  --------------------------------------------------*/


  function show_login_and_balance ($bdd, $username) {
    $request = $bdd->prepare("SELECT username, balance FROM users WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    echo '<div id="username_and_balance">Bienvenue ' . $fetch['username'] . '. Vous possèdez ' . 
          $fetch['balance'] . ' € </div>';
  }