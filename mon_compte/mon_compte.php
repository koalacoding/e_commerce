<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	$core_core_top_bar_text = array();
	$core_core_top_bar_text[0] = 'Mon compte';
	$core_core_top_bar_text[1] = '';
	include_pages('Mon compte', TRUE, $core_core_top_bar_text);
?>

<div id="core_core_menu">&nbsp;</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/footer.php'); ?>