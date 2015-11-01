/*----------------------------------------------------
------------------------------------------------------
-----------------DELETE BASKET PRODUCT----------------
------------------------------------------------------
----------------------------------------------------*/

function deleteBasketProduct() {
  $(document).on('click', '.deleteBasketProduct', function() {
    $.post("/e_commerce/basket/delete_basket_product/delete_basket_product.php",
      { productId: $(this).attr('id') },
		  function(data, status) {
		  	if (data == 'Erreur') {
		  		alert('Erreur');
		    }

		  	else { // If there is no error.
		  		updateBasketPrice();
          updateNbOfProductsInBasket();

					$.post("/e_commerce/basket/showBasket/showBasket.php",
					  function(data, status) {
			        $('#core_core').empty(); // To clean the core_core is there is already shown content.
			    		$('#core_core').append(data);
					 	}
          );
		  	}
		 	}
		);
  });
}

/*-----------------------------------
-------------------------------------
-----------------MAIN----------------
-------------------------------------
-----------------------------------*/

$(function() {
  deleteBasketProduct();
});
