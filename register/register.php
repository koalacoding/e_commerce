<?php 
	include_once('../include/include.php');
	$top_bar_text = array('Mon compte', 'Création d\'un compte');
	include_pages('Création d\'un compte', '../', TRUE, $top_bar_text);
?>
		<form action="register_action.php" method="post">
			Entrez votre adresse e-mail :<br />
			<input type="text" name="email" style="width: 35%;"/>
			<br />
			Confirmez votre email :<br />
			<input type="text" name="email_confirmation" style="width: 35%;"/>
			<br /><br />
			<div id="grey_bar">&nbsp;</div>
			<br />
			Votre civilité :<br />
			<input type="radio" name="civility" value="monsieur" checked>M.
			<input type="radio" name="civility" value="mademoiselle" checked>Mlle
			<input type="radio" name="civility" value="madame" checked>Mme
			<br />
			Votre prénom :<br />
			<input type="text" name="firstname" />
			<br />
			Votre nom :<br />
			<input type="text" name="lastname" />
			<br /><br />
			<div id="grey_bar">&nbsp;</div>
			<br />
			Votre adresse :<br />
			<input type="text" name="adress" />
			<br />
			Pays :<br />
			<select name="country">
			    <option value="France" selected>France</option>
			    <option value="Belgique">Belgique</option>
			</select>
			<br />
			Code postal :<br />
			<input type="text" name="postal_code" />
			<br />
			Ville :<br />
			<input type="text" name="city" />
			<br /><br />
			Numéros de téléphone pour vous joindre :<br />
			Fixe :<br />
			<input type="text" name="phone_fixe" />
			<br />
			Mobile :<br />
			<input type="text" name="phone_mobile" />
			<br /><br />
			<div id="grey_bar">&nbsp;</div>
			<br />
			Votre mot de passe :<br />
			<input type="text" name="password" />
			<br />
			Confirmation :<br />
			<input type="text" name="password_confirmation" />
			<br /><br />
			<input type="submit" value="OK" />
		</form>
<?php include_once('../include/footer.php'); ?>