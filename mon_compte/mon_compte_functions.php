<?php
	/*-----------------------------------------------------------
	-------------------------------------------------------------
	-----------------ECHO USER CIVILITY AND NAME-----------------
	-------------------------------------------------------------
	-----------------------------------------------------------*/

	function echo_user_civility_and_name($email) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		$request = $bdd->prepare("SELECT civility, firstname, lastname FROM users WHERE email=?");
		$request->execute(array($email));
		$fetch = $request->fetch();
		$request->closeCursor();

		echo '<b>' . htmlspecialchars($fetch['civility']) . ' ' .
			 htmlspecialchars(strtoupper($fetch['lastname'])) . ' ' .
			 htmlspecialchars($fetch['firstname']) . '</b>';
	}

	/*------------------------------------------------------------------
	--------------------------------------------------------------------
	-----------------ECHO SINCE WHEN IS USER REGISTERED-----------------
	--------------------------------------------------------------------
	------------------------------------------------------------------*/

	function echo_since_when_is_user_registered($email) {
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

		$request = $bdd->prepare("SELECT subscription_date FROM users WHERE email=?");
		$request->execute(array($email));
		$fetch = $request->fetch();
		$request->closeCursor();

		$year = substr($fetch['subscription_date'], 0, 4);
		$month = substr($fetch['subscription_date'], 5, 2);
		$day = substr($fetch['subscription_date'], 8, 2);
		echo $day . '/' . $month . '/' . $year;		
	}