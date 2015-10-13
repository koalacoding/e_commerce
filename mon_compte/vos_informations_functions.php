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

  /*----------------------------------------------------
  ------------------------------------------------------
  -----------------ECHO USER'S CIVILITY-----------------
  ------------------------------------------------------
  ----------------------------------------------------*/

  function echo_user_civility_checkbox($user_info) {
  	$m = '';
  	$mlle = '';
  	$mme = '';

  	switch($user_info) {
  		case 'M':
  			$m = 'checked';
  			break;
  		case 'Mlle':
  			$mlle = 'checked';
  			break;
  		case 'Mme':
  			$mme = 'checked';
  			break; 
  		default; 			  			
  	}

  	echo '<input type="radio" name="civility" value="M" ' . $m . '>M.
		  <input type="radio" name="civility" value="Mlle" ' . $mlle . '>Mlle
		  <input type="radio" name="civility" value="Mme" ' . $mme . '>Mme';
  }