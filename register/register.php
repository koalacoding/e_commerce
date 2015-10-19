<?php
	echo '<div id="test"></div>';
	include_once('../include/include.php');

	include_pages('Création d\'un compte', TRUE, array('Mon compte', 'Création d\'un compte'),
				  FALSE, TRUE);

	require_once 'register_form.php';

	echo_register_form('register_action.php', TRUE, array(), TRUE);

	require_once('../include/footer.php');
?>