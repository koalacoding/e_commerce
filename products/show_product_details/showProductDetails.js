/*----------------------------------------------------
------------------------------------------------------
-----------------SHOW PRODUCT DETAILS-----------------
------------------------------------------------------
----------------------------------------------------*/

function showProductDetails(productId) {
  $.post("/e_commerce/products/show_product_details/show_product_details.php",
      {
          product_id: productId
      },
      function(data, status) {
          $('#core_core').empty(); // To clean the core_core is there is content in it.
          $('#core_core').append(data);
          $('.productQuantitySpinnerInput').spinner({min: 1, max: 999});
      }
  );
}

/*----------------------------------------------------
------------------------------------------------------
-----------------HANDLE PRODUCT CLICK-----------------
------------------------------------------------------
----------------------------------------------------*/

/* When we either click on the product's image / name,
  or on the product's name in the search bar results. */
function handleProductClick() {
  var productId = 0;

	$(document).on('click', '.product_image, .productName', function() {
    if ($(this).hasClass('product_image')) productId = $(this).parent().parent().attr('id');
    // If the element the user clicked on is from the productName class.
    else productId = $(this).parent().parent().parent().attr('id');
    productId = parseInt(productId);
    showProductDetails(productId);
  });
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

$(function() {
    handleProductClick();
});
