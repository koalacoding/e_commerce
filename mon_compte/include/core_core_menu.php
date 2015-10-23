<div id="core_core_menu">
	<?php
		require_once 'core_core_menu_functions.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php';

		echo_new_core_core_menu_element(
			'http://image.noelshack.com/fichiers-sm/2015/42/1444717354-untitled.png', '32px',
			'/e_commerce/mon_compte/mon_compte.php', 'Accueil', TRUE);
		echo_new_core_core_menu_element(
		'http://image.noelshack.com/fichiers/2015/42/1444764737-member-zone-informations-logo.png',
		'33px', '/e_commerce/mon_compte/vos_informations/vos_informations.php', 'Vos informations',
		TRUE);
		echo_new_core_core_menu_element(
		'http://image.noelshack.com/fichiers/2015/43/1445623618-yourbasketlogo.png',
		'33px', '/e_commerce/mon_compte/monPanier/monPanier.php', 'Votre panier',
		TRUE);

		show_admin_zone_link_if_user_is_admin(is_user_admin($_SESSION['email']));
	?>
</div>