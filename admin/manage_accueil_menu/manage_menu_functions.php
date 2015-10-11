<?php
	/*----------------------------------------
	------------------------------------------
	----------------SHOW MENU-----------------
	------------------------------------------
	----------------------------------------*/


	function show_menu($bdd) {
		$request = $bdd->query("SELECT name FROM menu");

		while ($menu_name = $request->fetch()) {
			echo $menu_name['name'];
		}

		$request->closeCursor();
	}