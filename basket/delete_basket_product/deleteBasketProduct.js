/*----------------------------------------------------
------------------------------------------------------
-----------------DELETE BASKET PRODUCT----------------
------------------------------------------------------
----------------------------------------------------*/

function deleteBasketProduct() {
  $(document).on('click', '.delete_basket_product', function() {
    var productId = $(this).attr('id');

    function confirmDump() {
      $.post("/e_commerce/basket/delete_basket_product/delete_basket_product.php",
        { productId: productId },
  		  function(data, status) {
  		  	if (data == 'Erreur') {
  		  		alert('Erreur');
  		    }

  		  	else { // If there is no error.
            updateNbOfProductsInBasket();

  					$.post("/e_commerce/basket/showBasket/showBasket.php",
  					  function(data, status) {
  			        $('#core_core').empty(); // To clean the core_core is there is already shown content.
  			    		$('#core_core').append(data);
                updateBasketPrice();
  					 	}
            );
  		  	}
  		 	}
  		);
    }

    $( "#dialog-confirm" ).attr('title', 'Supprimer produit');
    $( ".ui-dialog-title" ).text('Supprimer produit');
    $( "#dialog-confirm p" ).text('Ce produit sera supprimé de votre panier. Êtes-vous sûr ?');
    $( "#dialog-confirm" ).dialog({
			resizable: false,
			height: 195,
			modal: true,
			buttons: {
				"Supprimer": function() {
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
  deleteBasketProduct();
});
