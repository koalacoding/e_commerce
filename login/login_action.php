<html>
	<head>
	    <style type="text/css">
	    #core {
	        padding-top: 17%;
	    }
	    </style>
	</head>

	<body>
		<div id="core">

		<?php
			include_once('../include/session.php');

			include_once('login_action_functions.php');

			if (isset($_POST['username'], $_POST['password'])) {
				include_once('../sql/sql_connexion.php');

				// If the POSTed hashed password matches the given username's password.
				if (check_password($bdd, $_POST['username'], hash_password($_POST['password'])) == TRUE) {
					$_SESSION['username'] = $_POST['username'];

					echo '<center>Vous êtes maintenant connecté. Redirection dans 2 secondes...</center>';
					header("refresh:2;url=../index.php");
				}

				else { // If the credentials don't match.
					echo '<center><font color="black">Mauvais identifiants.
									Redirection dans 2 secondes...</font></center>';
					header("refresh:2;url=login.php");
				}
			}

			else { // If $_POST['username'] or $_POST['password'] are not set.
				echo '<center>Erreur. Redirection in 2 seconds...</center>';
				header("refresh:2;url=../index.php");
			}

		?>
		</div>
	</body>
</html>