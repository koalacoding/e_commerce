<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');
	require_once('login_action_functions.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/redirect.php');

	if (isset($_POST['login_tooltip_email'], $_POST['login_tooltip_password'])) {
		// If the POSTed hashed password matches the given username's password.
		if (check_password($_POST['login_tooltip_email'],
			hash_password($_POST['login_tooltip_password'])) == TRUE) {
			$_SESSION['email'] = $_POST['login_tooltip_email'];
		}
	}

	redirect('/e_commerce/index.php');