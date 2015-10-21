<?php
	/*---------------------------------------------------
	-----------------------------------------------------
	------------EDIT ACCOUNT INFORMATIONS IN DB----------
	-----------------------------------------------------
	---------------------------------------------------*/

	function edit_account_informations_in_db($email, $civility, $firstname, $lastname, $adress,
											 $country, $postal_code, $city, $phone_fixe,
											 $phone_mobile) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		$request = $bdd->prepare("UPDATE users SET civility=?, firstname=?, lastname=?, adress=?,
												   country=?, postal_code=?, city=?, phone_fixe=?,
												   phone_mobile=? WHERE email=?");

		$request->execute(array($civility, $firstname, $lastname, $adress, $country, $postal_code,
								$city, $phone_fixe, $phone_mobile, $email));
		$request->closeCursor();
	}

	function edit_account_informations($email, $civility, $firstname, $lastname, $adress, $country,
									   $postal_code, $city, $phone_fixe, $phone_mobile) {
		$error_message = array();

		$error_message['email_invalid'] = $error_message['email_already_used'] =
		$error_message['emails_dont_match'] = $error_message['civility'] =
		$error_message['firstname'] = $error_message['firstname'] =
		$error_message['lastname'] = $error_message['adress'] =
		$error_message['postal_code'] = $error_message['city'] =
		$error_message['phone_fixe'] = $error_message['phone_mobile'] =
		$error_message['password_invalid'] = $error_message['passwords_dont_match'] = '';

		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/register/register_action_functions.php';

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


		// If no error is raised, we update the account.
		if (!check_if_error($error_message)) {
			edit_account_informations_in_db($email, $civility, $firstname, $lastname, $adress,
											 $country, $postal_code, $city, $phone_fixe,
											 $phone_mobile);
		}

		$_SESSION['error_message'] = $error_message;

		redirect('vos_informations.php');
	}