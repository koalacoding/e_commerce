<?php
	include_once('../../include/session.php');

	// We allow the user to post a new menu element only if he is connected and admin.
	if (isset($_SESSION['username'])) {
		include_once ('../../sql/sql_connexion.php');
		include_once('../check_if_user_is_admin/check_if_user_is_admin_function.php');

		if (is_user_admin($bdd, $_SESSION['username'])) { // If the user is admin.
			if (isset($_POST['element_name'])) { // If the new element's name has been sent.
				include_once('post_new_menu_element_functions.php');
				insert_element_in_db($bdd, $_POST['element_name']);

				header("Location: manage_accueil_menu.php");
				die();
			} 

			else { // If the element's name is missing.
		 		echo '<center><font color="black">Erreur avec le nom de l\'element.
		 						Redirection dans 2 secondes...</font></center>';
				header("refresh:2;url=manage_accueil_menu.php");
				die();
			}
		}

		else { // If the user is not admin.
	 		echo '<center><font color="black">Vous devez être admin pour accéder à cette zone.
	 						Redirection dans 2 secondes...</font></center>';
			header("refresh:2;url=manage_accueil_menu.php");
			die();
		}

	}

	else { // If the user isn't connected, we redirect him to the startpage.
	 	echo '<center><font color="black">Vous devez être connecté pour accéder à cette zone.
	 						Redirection dans 2 secondes...</font></center>';
		header("refresh:2;url=../../index.php");
	}
?>