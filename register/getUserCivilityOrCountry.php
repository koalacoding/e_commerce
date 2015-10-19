<?php
	if (isset($_GET['userEmail'], $_GET['checkedOrSelected'])) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		
		$request = $bdd->prepare("SELECT civility, country FROM users WHERE email=?");
		$request->execute(array($_GET['userEmail']));
		$fetch = $request->fetch();
		$request->closeCursor();

		if ($_GET['checkedOrSelected'] == 'checked') {
			echo $fetch['civility'];
		}

		else if ($_GET['checkedOrSelected'] == 'selected') {
			echo $fetch['country'];
		}
		
	}