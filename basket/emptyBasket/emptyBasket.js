/*----------------------------------------------------
------------------------------------------------------
-----------------EMPTY BASKET ON CLICK----------------
------------------------------------------------------
----------------------------------------------------*/

function emptyBasketOnClick() {
	$(document).on('click', '#emptyBasketButton', function() {
		$.post("/e_commerce/basket/emptyBasket/emptyBasket.php",
		  function(data, status) {
		  	if (data == 'Erreur') {
		  		alert('Erreur');
		  	}

		  	else {
		  		updateBasketPrice();
          updateNbOfProductsInBasket();

					$.post("/e_commerce/basket/showBasket/showBasket.php",
					  function(data, status) {
			        $('#core_core').empty(); // To clean the core_core is there are already shown content.
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
	emptyBasketOnClick();
});
