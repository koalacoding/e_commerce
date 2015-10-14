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

  function echo_user_civility_checkbox($civility) {
  	$m = '';
  	$mlle = '';
  	$mme = '';

  	switch($civility) {
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

  /*--------------------------------------------------------
  ----------------------------------------------------------
  -----------------ECHO COUNTRY SELECT LIST-----------------
  ----------------------------------------------------------
  --------------------------------------------------------*/

  /* Retrieve the country list from MySQL and put the user's country as selected
     in the country list. */

  function echo_select_user_country($user_country) {
    echo '<br />
          <select name="country">
            <option value="' .$user_country. '" selected>'.$user_country.'</option>';

    require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

    $request = $bdd->prepare("SELECT * FROM countries");
    $request->execute();
    
    while ($fetch = $request->fetch()) {
      if ($fetch['name'] != $user_country) { // If the country is not the user's one.
        echo '<option value="'.$fetch['name'].'">'.$fetch['name'].'</option>';
      }
    }

    $request->closeCursor();

    echo '</select>
          <br />
          <br />';
  }  