<?php
	include_once('register_action_functions.php');

	// If not all the POST variables are set, we redirect to register.php.
	if (count($_POST) != 13) {
		redirect('register.php');
	}

	require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';

	echo register_account($bdd, $_POST['email'], $_POST['email_confirmation'], $_POST['civility'],
					 $_POST['firstname'], $_POST['lastname'], $_POST['adress'],
					 $_POST['country'], $_POST['postal_code'], $_POST['city'],
					 $_POST['phone_fixe'], $_POST['phone_mobile'], $_POST['password'],
					 $_POST['password_confirmation']);

/*
					if ($registration_result != 1) { // If the registration failed, we show the error message.
						echo $registration_result;
						echo '<br /><br />';
					}

					echo 'Redirection in 2 seconds...';

					if ($registration_result == 1) { // If registration succeeded.
						echo 'Votre compte a été créé avec succès.';
						header("refresh:2;url=../index.php");
						die();
					}

					else {
						header("refresh:2;url=register.php");
					}

				}*/
?>

