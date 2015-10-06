<?php include_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="index_style.css">
		<title>Website name</title>
	</head>

	<body>
		<div id="top_bar">&nbsp;</div>
		<div id="header">
			<div id="logo_site">
				<img src="http://media.ldlc.com/v3/img/general/logo-ldlc-anim.gif"
				height="76" width="175">
			</div>

			<div id="right_buttons">
				<center>
				<?php
					include_once ('sql/sql_connexion.php');
					include_once('index_functions.php');
					include_once('admin/check_if_user_is_admin/check_if_user_is_admin_function.php');

					if (isset($_SESSION['username'])) { // If the user is connected to an account.
						show_login_and_balance ($bdd, $_SESSION['username']);
						show_connected_buttons($_SESSION['username']);
												// If the user is admin.
						if (is_user_admin($bdd, $_SESSION['username']) == TRUE) {
							// Show the admin button.
							echo '<a href="admin/index.php" class="button" id="admin_button"
									class="button">Admin</a>';
						}
					}

					else {
						show_not_connected_buttons();
					}
				?>
			</center>
			</div>
		</div>

		<center>
		<div id="core">
			<div id="core_core">
				<div id="core_core_core">
					<img src="https://www.pinnaclesports.com/Cms_Data/Sites/Guest/Themes/Default/icons/icon-tick.png">
					Ici le corps de la page.
				</div>

				<div id="menu">
					<div id="menu_title">MENU</div>
				</div>
			</div>

			
		</div>
		</center>
	</body>
</html>