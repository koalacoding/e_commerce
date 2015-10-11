<?php 
	include_once('../../include/include.php');
	include_pages('Gérer le menu', '../../', TRUE, array('Zone admin',
															'Gérer le menu'));
	include_once('manage_menu_functions.php');

	
?>

Voici le menu : <?php 
	require '../../sql/sql_connexion.php';

  show_menu($bdd);
  ?>

<?php
	include_once('../../include/footer.php');
?>