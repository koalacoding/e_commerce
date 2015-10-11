<?php 
	include_once('../include/include.php');
	$top_bar_text = array('Mon compte', 'Création d\'un compte');
	include_pages('Création d\'un compte', '../', TRUE, $top_bar_text);
?>
		<form action="register_action.php" method="post">
			Entrez votre adresse e-mail : <input type="text" name="email" />
			<br /><br />
			Confirmez votre email : <input type="text" name="confirm_email" />
			<br /><br />
			Votre civilité :
			<input type="radio" name="civilite" value="monsieur" checked>M.
			<input type="radio" name="civilite" value="mademoiselle" checked>Mlle
			<input type="radio" name="civilite" value="madame" checked>Mme
			<br /><br />						
			Votre prénom <input type="text" name="prenom" />
			<br /><br />
			Nom : <input type="text" name="nom" />
			<br /><br />
			Votre adresse : <input type="text" name="adresse" />
			<br /><br />
			Pays : 
			<select name="pays">
			    <option value="France" selected>France</option>
			    <option value="Belgique">Belgique</option>
			 </select>
			Code postal : <input type="text" name="code_postal" />
			<br /><br />
			Ville : <input type="text" name="ville" />
			<br /><br />
			Numéros de téléphone pour vous joindre :
			Fixe : <input type="text" name="phone_fixe" />
			Mobile : <input type="text" name="phone_mobile" />
			<br /><br />
			Votre mot de passe : <input type="text" name="password" />
			Confirmation : <input type="text" name="password_confirmation" />
			<br /><br />
			<input type="submit" value="OK" />
		</form>
<?php include_once('../include/footer.php'); ?>