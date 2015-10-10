<?php 
	include_once('../include/include.php');
	$top_bar_text = array('Mon compte', 'Création d\'un compte');
	include_pages('Accueil', '../', TRUE, $top_bar_text);
?>
		
		<form action="register_action.php" method="post">
			Entrez votre adresse e-mail : <input type="text" name="e-mail" />
			<br /><br />
			Password : <input type="password" name="password" />
			<br /><br />
			Re-enter password : <input type="password" name="password_confirmation" />
			<br /><br />
			Email : <input type="text" name="email" />
			<br /><br />
			<input type="submit" value="OK" />
		</form>
	</div>
</div>
<?php include_once('../include/footer.php'); ?>