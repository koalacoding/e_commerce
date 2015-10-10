<?php
	function include_pages($title, $path, $activate_core_core_top_bar, $top_bar_text) {
		include_once($path . 'include/session.php');
		include_once($path . 'include/head.php');
		include_once($path . 'include/top_bar.php');
		include_once($path . 'include/header.php');
		include_once($path . 'include/core.php');
	}
?>