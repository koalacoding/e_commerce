<?php
	require_once('include/include.php');
	include_pages('Accueil', FALSE, array(), FALSE, FALSE);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="getProducts/getProducts.js"></script>

<script src="basket/addToBasket/addToBasket.js"></script>
<script src="basket/basketPrice/basketPrice.js"></script>
<script src="/e_commerce/basket/nbOfProductsInBasket/nbOfProductsInBasket.js"></script>
<script src="/e_commerce/basket/showBasket/showBasket.js"></script>
<script src="/e_commerce/basket/emptyBasket/emptyBasket.js"></script>
<script src="/e_commerce/basket/delete_basket_product/deleteBasketProduct.js"></script>
<script src="/e_commerce/search_bar/searchBar.js"></script>

<?php require_once('include/footer.php');
