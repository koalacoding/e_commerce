/*----------------------------------------
------------------------------------------
--------------DELETE PRODUCT--------------
------------------------------------------
----------------------------------------*/

function deleteProduct() {
  $(document).on('click', '.product_details_delete_product_button', function() {
    var productId = $(this).attr('id');

    function confirmDelete() {
      $.post("/e_commerce/products/delete_product/delete_product.php",
        { product_id: productId },
        function(data, status) {
          // If there is no error, core_core gets cleaned.
          if (data == 'ok') $('#core_core').empty();
        }
      );
    }

    $( "#dialog-confirm" ).attr('title', 'Supprimer produit');
    $( ".ui-dialog-title" ).text('Supprimer produit');
    $( "#dialog-confirm p" ).text('Ce produit sera définitivement supprimé. Êtes-vous sûr ?');
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: 195,
      modal: true,
      buttons: {
        "Supprimer": function() {
          confirmDelete();
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
  deleteProduct();
});
