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
                // To clean core_core if there is already shown content in it.
  			        $('#core_core').empty();
  			    		$('#core_core').append(data);
                updateBasketPrice();
  					 	}
            );
  		  	}
  		 	}
  		);
    }

    $( "#dialog-confirm" ).attr('title', 'Supprimer produit du panier');
    $( ".ui-dialog-title" ).text('Supprimer produit du panier');
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
