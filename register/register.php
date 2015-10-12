<?php 
	include_once('../include/include.php');
	$top_bar_text = array('Mon compte', 'Création d\'un compte');
	include_pages('Création d\'un compte', '../', TRUE, $top_bar_text);

	$error_message = array();
	$error_message['email_invalid'] = $error_message['email_already_used'] =
	$error_message['emails_dont_match'] = $error_message['civility'] =
	$error_message['firstname'] = $error_message['firstname'] =
	$error_message['lastname'] = $error_message['adress'] =
	$error_message['postal_code'] = $error_message['city'] =
	$error_message['phone_fixe'] = $error_message['phone_mobile'] =
	$error_message['password_invalid'] = $error_message['passwords_dont_match'] = '';

	if (isset($_SESSION['error_message'])) {
		$error_message = $_SESSION['error_message'];
	}
?>

<?php echo $_SERVER['DOCUMENT_ROOT']; ?>
<a href="http://calebjacob.com" class="tooltip" title="This is my link's tooltip message!">Link</a>
		<form action="register_action.php" method="post">
			Entrez votre adresse e-mail :<br />
			<input type="text" name="email" style="width: 35%;"/>
			<?php
				echo '<span class="error_message">' . $error_message['email_invalid'] .
				  	 $error_message['email_already_used'] . '</span>';
			?>
			<br />

			Confirmez votre email :<br />
			<input type="text" name="email_confirmation" style="width: 35%;"/>
			<?php
				echo '<span class="error_message">' . $error_message['emails_dont_match'] . '</span>';
			?>
			<br /><br />

			<div id="grey_bar">&nbsp;</div>
			<br />

			Votre civilité :<br />
			<input type="radio" name="civility" value="monsieur" checked>M.
			<input type="radio" name="civility" value="mademoiselle" checked>Mlle
			<input type="radio" name="civility" value="madame" checked>Mme
			<?php
				echo '<span class="error_message">' . $error_message['civility'] . '</span>';
			?>
			<br />

			Votre prénom :<br />
			<input type="text" name="firstname" />
			<?php
				echo '<span class="error_message">' . $error_message['firstname'] . '</span>';
			?>
			<br />

			Votre nom :<br />
			<input type="text" name="lastname" />
			<?php
				echo '<span class="error_message">' . $error_message['lastname'] . '</span>';
			?>			
			<br /><br />

			<div id="grey_bar">&nbsp;</div>
			<br />

			Votre adresse :<br />
			<input type="text" name="adress" />
			<?php
				echo '<span class="error_message">' . $error_message['adress'] . '</span>';
			?>			
			<br />

			Pays :<br />
			<select name="country">
			    <option value="France" selected>France</option>
			    <option value="Belgique">Belgique</option>
			</select>	
			<br />

			Code postal :<br />
			<input type="text" name="postal_code" />
			<?php
				echo '<span class="error_message">' . $error_message['postal_code'] . '</span>';
			?>
			<br />

			Ville :<br />
			<input type="text" name="city" />
			<?php
				echo '<span class="error_message">' . $error_message['city'] . '</span>';
			?>			
			<br /><br />

			Numéros de téléphone pour vous joindre :<br />
			Fixe :<br />
			<input type="text" name="phone_fixe" />
			<?php
				echo '<span class="error_message">' . $error_message['phone_fixe'] . '</span>';
			?>			
			<br />

			Mobile :<br />
			<input type="text" name="phone_mobile" />
			<?php
				echo '<span class="error_message">' . $error_message['phone_mobile'] . '</span>';
			?>			
			<br /><br />

			<div id="grey_bar">&nbsp;</div>
			<br />

			Votre mot de passe :<br />
			<input type="password" name="password" />
			<?php
				echo '<span class="error_message">' . $error_message['password_invalid'] . '</span>';
			?>			
			<br />

			Confirmation :<br />
			<input type="password" name="password_confirmation" />
			<?php
				echo '<span class="error_message">' . $error_message['passwords_dont_match'] .
				 '</span>';
			?>			
			<br /><br />

			<input type="submit" value="OK" />
		</form>
<?php include_once('../include/footer.php'); ?>