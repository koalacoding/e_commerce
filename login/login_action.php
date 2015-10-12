<?php
	echo '<a href="/e_commerce/include/session.php">test</a>';
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');
	require_once('login_action_functions.php');

	if (isset($_POST['email'], $_POST['password'])) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/redirect.php');

		// If the POSTed hashed password matches the given username's password.
		if (check_password($bdd, $_POST['email'], hash_password($_POST['password'])) == TRUE) {
			$_SESSION['email'] = $_POST['email'];
		}
	}

	redirect('/e_commerce/index.php');