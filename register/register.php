<?php 
	include_once('../include/include.php');
	include_pages('Création d\'un compte', TRUE, array('Mon compte', 'Création d\'un compte'),
				  FALSE);

	if (isset($_SESSION['error_message'])) {
		$error_message = $_SESSION['error_message'];
	}

	else {
		$error_message = array();
		$error_message['email_invalid'] = $error_message['email_already_used'] =
		$error_message['emails_dont_match'] = $error_message['civility'] =
		$error_message['firstname'] = $error_message['firstname'] =
		$error_message['lastname'] = $error_message['adress'] =
		$error_message['postal_code'] = $error_message['city'] =
		$error_message['phone_fixe'] = $error_message['phone_mobile'] =
		$error_message['password_invalid'] = $error_message['passwords_dont_match'] = '';		
	}

	require_once 'register_form.php';

	require_once('../include/footer.php');
?>