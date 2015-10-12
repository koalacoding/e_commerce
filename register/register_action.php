<?php
	include_once('../include/session.php');
	include_once('register_action_functions.php');

	// If not all the POST variables are set, we redirect to register.php.
	if (count($_POST) != 13) {
		redirect('register.php');
	}

	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

	register_account($bdd, $_POST['email'], $_POST['email_confirmation'], $_POST['civility'],
					 $_POST['firstname'], $_POST['lastname'], $_POST['adress'],
					 $_POST['country'], $_POST['postal_code'], $_POST['city'],
					 $_POST['phone_fixe'], $_POST['phone_mobile'], $_POST['password'],
					 $_POST['password_confirmation']);

