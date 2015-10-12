<?php
	session_start(); // To get the current session.

	// Destroying the current session.
	session_unset();
	session_destroy();

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/redirect.php');
	redirect('/e_commerce/index.php');
