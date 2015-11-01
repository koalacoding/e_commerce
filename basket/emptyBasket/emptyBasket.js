/*----------------------------------------------------
------------------------------------------------------
-----------------EMPTY BASKET ON CLICK----------------
------------------------------------------------------
----------------------------------------------------*/

function emptyBasketOnClick() {
	$(document).on('click', '#emptyBasketButton', function() {
		function confirmDump() {
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
		}

		$( "#dialog-confirm" ).attr('title', 'Vider le panier');
		$( ".ui-dialog-title" ).text('Vider panier');
    $( "#dialog-confirm p" ).text('Votre panier sera entièrement vidé. Êtes-vous sûr ?');
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height: 195,
			modal: true,
			buttons: {
				"Vider le panier": function() {
					confirmDump();
					$( this ).dialog( "close" );
				},
				Annuler: function() {
					$( this ).dialog( "close" );
				}
			}
		});
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
