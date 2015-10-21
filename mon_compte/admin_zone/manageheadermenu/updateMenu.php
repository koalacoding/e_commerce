<?php
	if (isset($_POST['menuList'])) {
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

		echo 'ok';
	}