<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

	/* If the user is not connected, if he is not an admin, if the 3 POST variables are not set,
	   if the product name is not at least 1 character long,
	   or if the product price is not numeric. */
	if (!isset($_SESSION['email']) || !is_user_admin($_SESSION['email'])
		  || !isset($_POST['productName'], $_POST['productPrice'], $_POST['productDescription']
							  , $_POST['product_image_link'], $_POST['productCategory']) || strlen($_POST['productName']) < 1
			|| !is_numeric($_POST['productPrice'])) {
		header('Location: /e_commerce/index.php');
    die();
	}

	else { // If there is no problem.
		require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		$request = $bdd->prepare("INSERT INTO products(name, description, image_link, price, category)
															VALUES (?, ?, ?, ?, ?)");
		$request->execute(array(htmlspecialchars($_POST['productName'])
														, htmlspecialchars($_POST['productDescription'])
														, htmlspecialchars($_POST['product_image_link'])
														, htmlspecialchars($_POST['productPrice'])
														, htmlspecialchars($_POST['productCategory'])));
		$request->closeCursor();
		echo 1;
	}
