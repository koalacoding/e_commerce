<?php
	/*------------------------------------------------
	--------------------------------------------------
	-----------------SHOW MENU SELECT-----------------
	--------------------------------------------------
	------------------------------------------------*/

	function showMenuSelect() {
		echo '<select name="productCategory">';

	  require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
	  $request = $bdd->prepare("SELECT name FROM menu");
	  $request->execute();

	  while ($fetch = $request->fetch()) {
	  	echo '<option value="'.$fetch['name'].'">'.$fetch['name'].'</option>';
	  }

	  echo '</select>';
	}