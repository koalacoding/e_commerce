<?php
	/*----------------------------------------
	------------------------------------------
	-----------------REDIRECT-----------------
	------------------------------------------
	----------------------------------------*/

	function redirect($page_path) { // Redirect to a page.
		header('Location: ' . $page_path);
		die();
	}