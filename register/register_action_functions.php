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

	function is_email_valid_and_match($email) {
		if (preg_match("#^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z]{1,7}$#", $email)
			&& $email == $email_confirmation) {
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


	function is_city_name_valid($city_name) {
		/* Check if the city's name is between 1 and 30 characters,
			and only contains letters or dashes. */
		if (preg_match("#^[a-zA-Z-]{1, 30}$#", $city_name)) {
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
	-------IS PASSWORD VALID AND MATCH ?------
	----------------------------------------*/

	function is_password_valid_and_match($password, $password_confirmation) {
		/* Check if the password is between 2 and 30 characters, and only contains letters,
			numbers, underscores or dashes. Also checks if it matches the password confirmation. */
		if (preg_match("#^[a-zA-Z0-9-_]{2,30}$#", $password) && $password == $password_confirmation) {
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
	function register_account($username, $password, $password2, $email) {
		if (!is_username_valid($username)) {
			return 'Invalid username.';
		}

		if (check_if_username_already_taken($username)) {
			return 'Username already taken.';
		}

		if (!is_password_valid($password)) {
			return 'Invalid password.';
		}

		if (!check_if_passwords_match($password, $password2)) {
			return "Passwords don't match.";
		}

		if (!is_email_valid($email)) {
			return 'Invalid email.';
		}

		// If no error is raised, we insert the account into the DB.
		insert_account_in_db($username, $password, $email);
		return 1;
	}