<?php
  /*----------------------------------------------
  ------------------------------------------------
  -----------------GET USER'S INFO----------------
  ------------------------------------------------
  ----------------------------------------------*/

  function get_user_info($email) {
  	require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

  	$request = $bdd->prepare("SELECT * FROM users WHERE email=?");
  	$request->execute(array($email));
  	$fetch = $request->fetch();
  	$request->closeCursor();

  	return $fetch;
  }