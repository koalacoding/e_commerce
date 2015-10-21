<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/include/include.php');
	include_pages('Zone d\'administration', TRUE, array('Zone admin', 'Ajouter un nouveau produit')
				  , TRUE, FALSE);

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/functions/check_if_user_is_admin.php');
	redirect_if_user_not_admin($_SESSION['email']);

	require_once($_SERVER['DOCUMENT_ROOT'] . '/e_commerce/mon_compte/include/core_core_menu.php');
?>

<div id="core_core_core">
	<div id="core_core_core_text" style="white-space: nowrap;">
		<span>Nom du produit :</span>
		<input type="text" name="productName" style="width: 100%;"/>
		<span id="productNameErrorMessage" class="error_message">Nom invalide</span>
		<br />
		<span>Description du produit :</span>
		<textarea rows="4" cols="50" id="productDescription" form="addNewProductForm"
				  style="transform: translateY(40%);">
		</textarea>
		<br />
		<br />
		<br />
		<span>Prix du produit :</span>
		<input type="text" name="productPrice" style="width: 30%;"/> €
		<span id="productPriceErrorMessage" class="error_message">Prix invalide</span>
		<br />
		<br />		
		<input id="submitFormButton" type="submit" value="Ajouter" style="margin-left:100%;"
			   disabled/>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="addNewProduct.js"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/e_commerce/include/footer.php'; ?>