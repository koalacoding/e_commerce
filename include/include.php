<?php
	function include_pages($title, $path) {
		$title = $title;
		$path = $path;
		include_once('include/session.php');
		include_once('include/head.php');
		include_once('include/top_bar.php');
		include_once('include/header.php');
	}
?>