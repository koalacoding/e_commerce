<?php include_once('../../include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../../index_style.css">
		<title>Modification du menu de la page d'accueil</title>
	</head>

	<body>
		<?php
			include_once ('../../sql/sql_connexion.php');

		 	if (isset($_SESSION['username'])) {
		 		include_once('../check_if_user_is_admin/check_if_user_is_admin_function.php');

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
							<a href="../../index.php" class="button">Retour à l'accueil</a>
							<a href="../index.php" class="button">
								Retour au panneau d'administration
							</a>
						</center>
						</div>
					</div>

					<center>
					<div id="core">
						<div id="core_core">
							<div id="core_core_core">
								<div id="core_core_core_title">Gérer le menu de la page d'accueil</div>

								<form action="post_new_menu_element.php" method="post">
								Ajouter un nouvel élément : <input type="text" name="element_name"/>
								<input type="submit" value="OK" />
								</form>

								<p>Voici un aperçu du menu :</p>
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