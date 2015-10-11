<?php
	include_once('register_action_functions.php');

	if (count($_POST) != 13) {
		redirect('register.php');
	}
/*
	$registration_result = register_account($_POST['username'], $_POST['password'],
																									$_POST['password_confirmation'], $_POST['email']);

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

				} */
?>

