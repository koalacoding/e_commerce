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
		$error_message = array();

		$error_message['email_invalid'] = $error_message['email_already_used'] =
		$error_message['emails_dont_match'] = $error_message['civility'] =
		$error_message['firstname'] = $error_message['firstname'] =
		$error_message['lastname'] = $error_message['adress'] =
		$error_message['postal_code'] = $error_message['city'] =
		$error_message['phone_fixe'] = $error_message['phone_mobile'] =
		$error_message['password_invalid'] = $error_message['passwords_dont_match'] = '';


		if (!is_email_valid($email)) {
			$error_message['email_invalid'] = '- Email invalide. ';
		}

		if (check_if_email_already_taken($email)) {
			$error_message['email_already_used'] = '- Cet email est déjà utilisé.';
		}

		if (!do_passwords_match($email, $email_confirmation)) {
			$error_message['emails_dont_match'] = '- Les deux emails ne sont pas identiques.';
		}	

		if ($civility != 'M' && $civility != 'Mlle' && $civility != 'Mme') {
			$error_message['civility'] = '- Civilité incorrecte.';
		}

		if (!is_name_valid($firstname)) {
			$error_message['firstname'] = '- Prénom incorrect.';
		}

		if (!is_name_valid($lastname)) {
			$error_message['lastname'] = '- Nom incorrect.';
		}

		if (!is_adress_valid($adress)) {
			$error_message['adress'] = '- Adresse incorrecte.';
		}

		if (!is_postal_code_valid($postal_code)) {
			$error_message['postal_code'] = '- Code postal incorrect.';
		}

		if (!is_city_valid($city)) {
			$error_message['city'] = '- Ville incorrecte.';
		}

		if (!is_phone_number_valid($phone_fixe)) {
			$error_message['phone_fixe'] = '- Téléphone fixe incorrect.';
		}

		if (!is_phone_number_valid($phone_mobile)) {
			$error_message['phone_mobile'] = '- Téléphone mobile incorrect.';
		}

		if (!is_password_valid($password)) {
			$error_message['password_invalid'] = '- Mot de passe invalide.';
		}

		if (!do_passwords_match($password, $password_confirmation)) {
			$error_message['passwords_dont_match'] =
			'- Les deux mots de passes ne sont pas identiques.';
		}		


		// If no error is raised, we insert the account into the DB.
		if (!check_if_error($error_message)) {
			insert_account_in_db($email, $civility, $firstname, $lastname, $adress, $country,
								 $postal_code, $city, $phone_fixe, $phone_mobile, $password);
			$_SESSION['email'] = $email;
			redirect('../index.php');
		}

		else {
			$_SESSION['error_message'] = $error_message;
			redirect('register.php');
		}
	}