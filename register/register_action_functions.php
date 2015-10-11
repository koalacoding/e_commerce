<?php
	/*----------------------------------------
	------------------------------------------
	-----------------REDIRECT-----------------
	------------------------------------------
	----------------------------------------*/

	function redirect($page_path) { // Redirect to a page.
		header('Location: ' . $page_path);
		die();
	}


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

	function check_if_email_already_taken($bdd, $email) {
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
		if (preg_match("#^[a-zA-Z0-9-]{2, 50}$#", $adress)) {
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
		if (preg_match("#^[0-9-]{3, 10}$#", $postal_code)) {
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
		if (preg_match("#^[a-zA-Z-]{1, 30}$#", $city)) {
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
		if (preg_match("#^[0-9-]{4, 14}$#", $phone_number)) {
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


	/* Function to do all the necessary tasks to check the fields the user gave,
		and if they are correct, to register the account into the database. */
	function register_account($bdd, $email, $email_confirmation, $civility, $firstname, $lastname,
							  $adress, $country, $postal_code, $city, $phone_fixe, $phone_mobile,
							  $password, $password_confirmation) {
		$error_message = '';

		if (!is_email_valid($email)) {
			$error_message = '- Email invalide.<br />';
		}

		if (check_if_email_already_taken($bdd, $email)) {
			$error_message = $error_message . '- Cet email est déjà utilisé.<br />';
		}

		if (!do_passwords_match($email, $email_confirmation)) {
			$error_message = $error_message . '- Les deux emails ne sont pas identiques.<br />';
		}	

		if ($civility != 'monsieur' && $civility != 'mademoiselle' && $civility != 'madame') {
			$error_message = $error_message . '- Civilité incorrecte.<br />';
		}

		if (!is_name_valid($firstname)) {
			$error_message = $error_message . '- Prénom incorrect.<br />';
		}

		if (!is_name_valid($lastname)) {
			$error_message = $error_message . '- Nom incorrect.<br />';
		}

		if (!is_adress_valid($adress)) {
			$error_message = $error_message . '- Adresse incorrecte.<br />';
		}

		if (!is_postal_code_valid($postal_code)) {
			$error_message = $error_message . '- Code postal incorrect.<br />';
		}

		if (!is_city_valid($city)) {
			$error_message = $error_message . '- Ville incorrecte.<br />';
		}

		if (!is_phone_number_valid($phone_fixe)) {
			$error_message = $error_message . '- Téléphone fixe incorrect.<br />';
		}

		if (!is_phone_number_valid($phone_mobile)) {
			$error_message = $error_message . '- Téléphone mobile incorrect.<br />';
		}

		if (!is_password_valid($password)) {
			$error_message = $error_message . '- Mot de passe invalide.<br />';
		}

		if (!do_passwords_match($password, $password_confirmation)) {
			$error_message = $error_message .
							 '- Les deux mots de passes ne sont pas identiques.<br />';
		}		

		
		if ($error_message == '') { // If no error is raised, we insert the account into the DB.
			insert_account_in_db($email, $civility, $firstname, $lastname, $adress, $country,
								 $postal_code, $city, $phone_fixe, $phone_mobile, $password);
			return 'Votre compte a été créé avec succès';
		}

		else {
			return $error_message;
		}
	}