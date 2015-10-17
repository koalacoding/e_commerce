<?php
	/*----------------------------------------------------------------------
	------------------------------------------------------------------------
	---------------RETRIEVE USER CIVILITY, LASTNAME AND ECHO IT-------------
	------------------------------------------------------------------------
	----------------------------------------------------------------------*/

	function echo_user_civility_and_lastname($email) {
		require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
		
		$request = $bdd->prepare("SELECT civility, lastname FROM users WHERE email=?");
		$request->execute(array($email));

		$fetch = $request->fetch();

		echo htmlspecialchars($fetch['civility'] . ' ' . ucfirst($fetch['lastname']));

		$request->closeCursor();
	}


	/*---------------------------------------
	-----------------------------------------
	---------------LOGIN TOOLTIP-------------
	-----------------------------------------
	---------------------------------------*/


		/*----------------------------------------------------
		------------SHOW NOT CONNECTED LOGIN TOOLTIP----------
		----------------------------------------------------*/

		function show_not_connected_login_tooltip() {
			echo '<form action="/e_commerce/login/login_action.php" method="post">
					<input type="text" name="login_tooltip_email" class="login_tooltip_input_field"
						   value="Votre email" onclick="this.value=\'\';">
					<br />
					<input type="password" name="login_tooltip_password"
						   class="login_tooltip_input_field"
						   value="xxxxxxxxxxx" onclick="this.value=\'\';">
					<input type="submit" value="CONNEXION"
					 	   class="login_tooltip_connexion_button" />
				  </form>

				  <a href="/e_commerce/register/register.php"
				  	 class="login_tooltip_inscription_button">INSCRIPTION</a>
				  ';
		}

		/*----------------------------------------------------
		------------SHOW CONNECTED LOGIN TOOLTIP----------
		----------------------------------------------------*/	

		function show_connected_login_tooltip() {
			echo '<a href="/e_commerce/mon_compte/mon_compte.php"
					 id="login_tooltip_access_member_zone_button">
				  	ACCEDER A MON COMPTE
				  </a>
				  <br />
				  <a id="logout_link" href="/e_commerce/login/logout.php">
				  	Se déconnecter
				  </a>';
		}


	/*----------------------------------------
	------------------------------------------
	-----------SHOW MENU ELEMENTS-------------
	------------------------------------------
	----------------------------------------*/

	function show_menu_elements() {
		require ($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php');

		$request = $bdd->query("SELECT name FROM menu");

	    while ($fetch = $request->fetch()) {
	    	echo '<div class="menu_element">
					<div class="menu_element_title">' . $fetch['name'] . '</div>
					<div class="menu_element_white_arrow">
						<img src="http://media.ldlc.com/v3/img/general/ico-triangle-bas.gif"
							 alt="white_arrow" />
					</div>
				  </div>';
	    }

	    $request->closeCursor();
	}