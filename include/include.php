<?php
	function include_pages($title, $activate_core_core_top_bar, $top_bar_text) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/head.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/top_bar.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/header.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/core.php');
	}
?>