<?php
	session_start(); // To get the current session.

	// Destroying the current session.
	session_unset();
	session_destroy();

	echo 'Deconnexion. Redirection dans 2 secondes...';
	header("refresh:2;url=../index.php");
