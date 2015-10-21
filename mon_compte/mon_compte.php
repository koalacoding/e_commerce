<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Mon compte', TRUE, array('Mon compte', '&nbsp;'), TRUE, FALSE);
	require_once('include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text">
		<div class="core_core_core_text_title">Bienvenue sur votre espace personnel</div>
		<p>Profitez de l'ensemble des fonctionnalités qui vous sont proposées sur votre espace 
		   personnel pour consulter, suivre et gérer toutes les données vous concernant.</p>
	</div>

	<div id="core_core_core_grey_box">
		<?php
			require_once('mon_compte_functions.php');
			echo_user_civility_and_name($_SESSION['email']);
		?>
		<a href="vos_informations/vos_informations.php" style="float: right; color: #103494;">
			modifier
		</a>

		<p>
		Vous êtes client depuis le <?php echo_since_when_is_user_registered($_SESSION['email']); ?>
		</p>
	</div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/footer.php'); ?>