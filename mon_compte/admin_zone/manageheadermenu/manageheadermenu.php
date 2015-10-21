<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Gérer le menu du haut', TRUE, array('Zone admin', 'Gérer le menu du haut'),
				  TRUE, FALSE);

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php');
	redirect_if_user_not_admin($_SESSION['email']);
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/mon_compte/include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text" style="white-space: nowrap;">
		<span>Nom du menu :</span>
		<input type="text" name="menuNameAdd" style="width: 100%;"/>&nbsp;
		<input id="submitButtonAdd" type="submit" value="Ajouter" />
		<br />
		<br />
		<span>Nom du menu :</span>
		<input type="text" name="menuNameRemove" style="width: 100%;"/>&nbsp;
		<input id="submitButtonRemove" type="submit" value="Supprimer" />
		<br />
		<br />
		<input id="submitModifications" type="submit" value="Valider les modifications" style="margin-left:150%"/>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/e_commerce/mon_compte/admin_zone/manageheadermenu/manageheadermenu.js"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/e_commerce/include/footer.php'; ?>