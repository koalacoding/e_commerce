/*------------------------------------------------------
--------------------------------------------------------
-----------------ON CLICK ADD TO BASKET-----------------
--------------------------------------------------------
------------------------------------------------------*/

function onClickAddToBasket() {
	// We use 'on' because we use AJAX to add new elements to the DOM.
	$(document).on('click', '.addToBasket', function() {
		var productId = $(this).parent().parent().attr('id');
        // Finds the spinner and gets its value.
        var quantity = ($(this).parent().find("[aria-valuemax=999]").attr('aria-valuenow'));
		$.post("/e_commerce/basket/addToBasket/addToBasket.php",
        {
            productId: productId,
            quantity: quantity
        },
        function(data, status) {
            updateBasketPrice();
            updateNbOfProductsInBasket();
        	if (data == 'ok') { // If no error.
              alert('Produit ajouté avec succès dans votre panier.');
        	}

        	else {
              alert(data);
        	  alert('Erreur.');
        	}
        });
	});
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

$(function() {
    onClickAddToBasket();  
});