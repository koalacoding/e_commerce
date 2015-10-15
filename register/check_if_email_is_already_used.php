<?php
	if (isset($_GET['email'])) {
		if ($_GET['email'] == '') {
			echo 'email is empty';
		}

		else {
			require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

			$request = $bdd->prepare("SELECT email FROM users WHERE email=?");
			$request->execute(array($_GET['email']));

			if ($request->rowCount() > 0) { // If the email is already used in the database.
				$request->closeCursor();
				echo 'TRUE';
			}

			else {
				$request->closeCursor();
				echo 'FALSE';
			}
		}
}

	else {
		echo 'email not isset';
	}