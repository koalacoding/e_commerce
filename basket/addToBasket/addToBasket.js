/*------------------------------------------------------
--------------------------------------------------------
-----------------ON CLICK ADD TO BASKET-----------------
--------------------------------------------------------
------------------------------------------------------*/

function onClickAddToBasket() {
	// We use 'on' because we use AJAX to add new elements to the DOM.
	$(document).on('click', '.addToBasket', function() {
		var productId = $(this).parent().parent().attr('id');
		
		$.post("/e_commerce/basket/addToBasket/addToBasket.php",
        {
            productId: productId
        },
        function(data, status) {
            updateBasketPrice();
        	if (data == 'ok') { // If no error.
            alert('Produit ajouté avec succès dans votre panier.');
        	}

        	else {
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