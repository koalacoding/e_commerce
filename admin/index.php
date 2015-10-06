<?php include_once('../include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../index_style.css">
		<title>Panneau d'administration</title>
	</head>

	<body>
		<?php
			include_once ('../sql/sql_connexion.php');
			include_once('check_if_user_is_admin/check_if_user_is_admin_function.php');


		 	if (isset($_SESSION['username'])) {
		 		if (is_user_admin($bdd, $_SESSION['username'])) { // If the user is admin. ?>
					<div id="top_bar">&nbsp;</div>
					<div id="header">
						<div id="logo_site">
							<img src="http://media.ldlc.com/v3/img/general/logo-ldlc-anim.gif"
							height="76" width="175">
						</div>

						<div id="right_buttons">
							<center>
							<div id="username_and_balance">&nbsp;</div>
							<a href="../index.php" class="button">Retour à l'accueil</a>
						</center>
						</div>
					</div>

					<center>
					<div id="core">
						<div id="core_core">
							<div id="core_core_core">
								<div id="core_core_core_title">Zone d'administration</div>

								<a href="manage_accueil_menu/manage_accueil_menu.php">Gérer le menu de la page d'accueil</a>
							</div>

							<div id="menu">
								<div id="menu_title">MENU</div>
							</div>
						</div>

						
					</div>
					</center>
		<?php
				} else { // If the user is not an admin.
					echo '<center><font color="black">Vous n\'êtes pas admin.
									Redirection dans 2 secondes...</font></center>';
					header("refresh:2;url=../index.php");
				}
		 	} else { // If the user is not connected.
		 		echo '<center><font color="black">Vous n\'êtes pas connecté.
		 						Redirection dans 2 secondes...</font></center>';
				header("refresh:2;url=../index.php");
		 	}
		?>
	</body>
</html>