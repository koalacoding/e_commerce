<?php
	function include_pages($title, $activate_core_core_top_bar, $top_bar_text,
						   $redirect_to_index_if_not_connected) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/session.php');

		if ($redirect_to_index_if_not_connected == TRUE) {
			if (!isset($_SESSION['email'])) {
				require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/redirect.php');
				redirect('/e_commerce/index.php');
			}
		}

		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/head.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/top_bar.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/header.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/core.php');
	}
?>