<?php
	/*----------------------------------------
	------------------------------------------
	-----------SHOW MENU ELEMENTS-------------
	------------------------------------------
	----------------------------------------*/

	function show_menu_elements($bdd) {
		$request = $bdd->query("SELECT name FROM menu");

	    while ($fetch = $request->fetch()) {
	    	echo '<div class="menu_element">
					<div class="menu_element_title">' . $fetch['name'] . '</div>
					<div class="menu_element_white_arrow"><img src="http://media.ldlc.com/v3/img/general/ico-triangle-bas.gif" /></div>
				  </div>';
	    }
	}