<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Mon compte', TRUE, array('Mon compte', 'Editer vos informations personnelles'),
				  TRUE);
	require_once('include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text">
		<div class="core_core_core_text_title" style="width: 700px">Titulaire du compte</div>

		<form action="register_action.php" method="post">
			<br /><br /><b>Votre civilité :</b><br />
			<?php
				require_once 'vos_informations_functions.php';
				$user_info = get_user_info($_SESSION['email']);
				echo_user_civility_checkbox($user_info['civility']);
			?><br /><br />

			<b>Votre prénom :</b><br />
			<input type="text" name="firstname" value="<?php echo $user_info['firstname']; ?>"/>
			<br /><br />

			<b>Votre nom :</b><br />
			<input type="text" name="lastname" value="<?php echo $user_info['lastname']; ?>"/>
			<br /><br />

			<b>Votre adresse :</b><br />
			<input type="text" name="adress" value="<?php echo $user_info['adress']; ?>"/>
			<br /><br />

			<b>Votre adresse :</b><br />
			<input type="text" name="adress" value="<?php echo $user_info['adress']; ?>"/>
			<br /><br />			
		</form>
	</div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/footer.php'); ?>