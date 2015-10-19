<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Mon compte', TRUE, array('Mon compte', 'Editer vos informations personnelles'), TRUE, FALSE);

	require_once('include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text">
		<div class="core_core_core_text_title" style="width: 700px">Titulaire du compte</div>
		<?php
		require_once('vos_informations_functions.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/register/register_form.php');
		$user_info = get_user_info($_SESSION['email']);
		echo_register_form('vos_informations_action.php', FALSE, $user_info, FALSE);
		?>
	</div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/footer.php'); ?>