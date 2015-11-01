<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Zone d\'administration', TRUE, array('Mon compte', 'Zone d\'administration'),
				  TRUE, FALSE);

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php');
	redirect_if_user_not_admin($_SESSION['email']);

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/mon_compte/include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text" style="white-space: nowrap;">
		<div class="core_core_core_text_title">Bienvenue dans la zone d'administration</div>
		<p>Vous pouvez ici gérer différentes fonctionnalités du site.</p>
		<br />
		<a class="coreCoreCoreTextTitle"
		   href="/e_commerce/mon_compte/admin_zone/addNewProduct/addNewProduct.php">
			Ajouter un nouveau produit
		</a>
		<br />
		<br />
		<a class="coreCoreCoreTextTitle"
		   href="/e_commerce/mon_compte/admin_zone/manageheadermenu/manageheadermenu.php">
		   Gérer le menu du haut
		</a>
	</div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/e_commerce/include/footer.php'; ?>
