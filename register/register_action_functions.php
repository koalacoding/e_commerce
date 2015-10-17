<?php
	require_once('../functions/redirect.php');


	/*----------------------------------------
	------------------------------------------
	------------------EMAIL-------------------
	------------------------------------------
	----------------------------------------*/


	/*--------------------------------------------------------------------------
	---------IS EMAIL VALID AND DOES IT MATCH TO THE EMAIL CONFIRMATION ?-------
	--------------------------------------------------------------------------*/

	function is_email_valid($email) {
		if (preg_match("#^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z]{1,7}$#", $email)) {
			return TRUE;
		}

		return FALSE;
	}

	/*------------------------------
	-----IS EMAIL ALREADY TAKEN ?---
	------------------------------*/

	function check_if_email_already_taken($email) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		
		$request = $bdd->prepare("SELECT email FROM users WHERE email=?");
		$request->execute(array($email));

		if ($request->rowCount() > 0) { // If the email is already used in the database.
			$request->closeCursor();
			return TRUE;
		}

		$request->closeCursor();
		return FALSE;
	}	


	/*----------------------------------------
	------------------------------------------
	----------CHECK IF NAME IS VALID----------
	------------------------------------------
	----------------------------------------*/


	function is_name_valid($name) {
		/* Check if the username is between 2 and 30 characters,
			and only contains letters or dashes */
		if (preg_match("#^[a-zA-Z-]{2,30}$#", $name)) {
			return TRUE;
		}

		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	---------CHECK IF ADRESS IS VALID---------
	------------------------------------------
	----------------------------------------*/


	function is_adress_valid($adress) {
		/* Check if the adress is between 2 and 50 characters,
			and only contains letters, numbers or dashes */
		echo 'adress:'.$adress;
		if (preg_match("#^[a-zA-Z0-9- ]{2,50}$#", $adress)) {
			return TRUE;
		}

		return FALSE;
	}

	/*----------------------------------------
	------------------------------------------
	-------CHECK IF POSTAL CODE IS VALID------
	------------------------------------------
	----------------------------------------*/


	function is_postal_code_valid($postal_code) {
		/* Check if the postal code is between 3 and 10 numbers,
			and only contains numbers or dashes. */
		if (preg_match("#^[0-9-]{3,10}$#", $postal_code)) {
			return TRUE;
		}

		return FALSE;
	}

	/*----------------------------------------
	------------------------------------------
	-------CHECK IF CITY'S NAME IS VALID------
	------------------------------------------
	----------------------------------------*/


	function is_city_valid($city) {
		/* Check if the city's name is between 1 and 30 characters,
			and only contains letters or dashes. */
		if (preg_match("#^[a-zA-Z- éèàê']{1,30}$#", $city)) {
			return TRUE;
		}

		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	-------CHECK IF PHONE NUMBER IS VALID-----
	------------------------------------------
	----------------------------------------*/


	function is_phone_number_valid($phone_number) {
		/* Check if the phone number is between 4 and 14 numbers,
			and only contains numbers or dashes. */
		if (preg_match("#^[0-9- ]{4,14}$#", $phone_number)) {
			return TRUE;
		}

		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	-----------------PASSWORD-----------------
	------------------------------------------
	----------------------------------------*/


	/*----------------------------------------
	------------IS PASSWORD VALID ?-----------
	----------------------------------------*/

	function is_password_valid($password) {
		/* Check if the password is between 2 and 30 characters, and only contains letters,
			numbers, underscores or dashes. */
		if (preg_match("#^[a-zA-Z0-9-_]{2,30}$#", $password)) {
			return TRUE;
		}

		return FALSE;
	}

	/*----------------------------------------
	------------DO PASSWORDS MATCH ?----------
	----------------------------------------*/

	function do_passwords_match($password0, $password1) {
		if ($password0 == $password1) {
			return TRUE;
		}

		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	------------INSERT ACCOUNT IN DB----------
	------------------------------------------
	----------------------------------------*/


	function insert_account_in_db($email, $civility, $firstname, $lastname, $adress, $country,
									$postal_code, $city, $phone_fixe, $phone_mobile, $password) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		// Hashing password + salt to SHA-256;
		$password = hash('sha256', 'er4t94e4r5' . $password);

		$request = $bdd->prepare ('INSERT INTO users(email, civility, firstname, lastname, adress,
														country, postal_code, city, phone_fixe,
														phone_mobile, password, subscription_date)
									VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
		$request->execute(array($email, $civility, $firstname, $lastname, $adress, $country,
								$postal_code, $city, $phone_fixe, $phone_mobile, $password));
		$request->closeCursor();
	}


	/*----------------------------------------
	------------------------------------------
	-----------COMPLETE REGISTRATION----------
	------------------------------------------
	----------------------------------------*/

	/*----------------------------------------------
	------------CHECK IF THERE IS AN ERROR----------
	----------------------------------------------*/

	function check_if_error($array) {
		$i = 0;

		while ($i < 13) {
			if (array_values($array)[$i] != '') { // If the field is not empty (i.e if there is an error).
				return TRUE;
			}
			$i++;
		}

		return FALSE;
	}

	/*------------------------------------
	------------REGISTER ACCOUNT----------
	------------------------------------*/

	/* Function to do all the necessary tasks to check the fields the user gave,
		and if they are correct, to register the account into the database. */
	function register_account($email, $email_confirmation, $civility, $firstname, $lastname,
							  $adress, $country, $postal_code, $city, $phone_fixe, $phone_mobile,
							  $password, $password_confirmation) {
		if (!is_email_valid($email) ||
			check_if_email_already_taken($email) ||
			!do_passwords_match($email, $email_confirmation) ||
			($civility != 'M' && $civility != 'Mlle' && $civility != 'Mme') ||
			!is_name_valid($firstname) ||
			!is_name_valid($lastname) ||
			!is_adress_valid($adress) ||
			!is_postal_code_valid($postal_code) ||
			!is_city_valid($city) ||
			!is_phone_number_valid($phone_fixe) ||
			!is_phone_number_valid($phone_mobile) ||
			!is_password_valid($password) ||
			!do_passwords_match($password, $password_confirmation)) {
				redirect('register.php');
			}

		// If no error is raised, we insert the account into the DB.
		else {
			insert_account_in_db($email, $civility, $firstname, $lastname, $adress, $country,
								 $postal_code, $city, $phone_fixe, $phone_mobile, $password);
			$_SESSION['email'] = $email;
			redirect('../index.php');
		}
	}