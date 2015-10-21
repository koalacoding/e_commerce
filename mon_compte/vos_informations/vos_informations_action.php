<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';

	// If not all the POST variables are set, we redirect to vos_informations.php.
	if (count($_POST) != 9) {
		redirect('vos_informations.php');
	}

	require_once 'vos_informations_action_functions.php';
	edit_account_informations($_SESSION['email'], $_POST['civility'], $_POST['firstname'],
							  $_POST['lastname'], $_POST['adress'], $_POST['country'],
							  $_POST['postal_code'], $_POST['city'], $_POST['phone_fixe'],
							  $_POST['phone_mobile']);