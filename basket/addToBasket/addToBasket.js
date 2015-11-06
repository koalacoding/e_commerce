/*------------------------------------------------------
--------------------------------------------------------
-----------------ON CLICK ADD TO BASKET-----------------
--------------------------------------------------------
------------------------------------------------------*/

function onClickAddToBasket() {
	// We use 'on' because we use AJAX to add new elements to the DOM.
	$(document).on('click', '.addToBasket, #product_details_add_to_basket_button', function() {
		var productId = 0;

		if ($(this).hasClass('addToBasket')) productId = $(this).parent().parent().attr('id');
		else productId = $('#product_details_id').text();

    // Finds the spinner and gets its value.
    var quantity = $('.productQuantitySpinnerInput').attr('aria-valuenow');

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
      }
		);
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
