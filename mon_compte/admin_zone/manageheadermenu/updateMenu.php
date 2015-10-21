<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

  /* If menuList is not set, if the user is not connected
  	 or if he is not an admin, we stop the code. */
	if (!isset($_POST['menuList']) || !isset($_SESSION['email'])
		|| !is_user_admin($_SESSION['email'])) {
		header('Location: /e_commerce/index.php');
    	die();
	}

	else { // If everything is ok.
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		$bdd->query("DELETE FROM menu"); // Delete every row in the "menu" table.

		if ($_POST['menuList'][0] != 'clearTable') {
			$request = $bdd->prepare("INSERT INTO menu(name) VALUES (?)");

			// Every menu title contained in the $_POST['menuList'] will be added to the "menu" table.
			for ($i = 0; $i < count($_POST['menuList']); $i++) {
				$request->execute(array($_POST['menuList'][$i]));
			}

			$request->closeCursor();
		}

		echo 1;
	}