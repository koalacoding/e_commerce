<?php 
	include_once('../include/include.php');

	include_pages('Création d\'un compte', TRUE, array('Mon compte', 'Création d\'un compte'),
				  FALSE, TRUE);

	require_once 'register_form.php';
	$error_message = initialize_error_message_array($_SESSION);

	echo '<form action="register_action.php" method="post" style="padding: 3%;">';
	echo_register_form(TRUE, TRUE, TRUE, $error_message, array(), TRUE);

	require_once('../include/footer.php');
?>