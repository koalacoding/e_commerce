/*--------------------------------------
----------------------------------------
--------------MODIFY PRODUCT------------
----------------------------------------
--------------------------------------*/

function modifyProduct() {
  $(document).on('click', '.product_details_modify_product_button', function() {
    var validateModifyProductButton = '<button class="product_details_validate_modify_product_button">\
                                         Valider les modifications\
                                       </button>';
    var cancelModifyProductButton = '<button class="product_details_cancel_modify_product_button">\
                                        Annuler les modifications\
                                     </button>';
    $(this).before(validateModifyProductButton);
    $(this).before(cancelModifyProductButton);
    $(this).hide();

    var productName = $('#product_details_name').text();
    var productNameNewHTML = '<input type="text" name="product_name" value="'+productName+'"\
                                     style="width: 100%;">';
    $('#product_details_name').html(productNameNewHTML);

    var productMiniDescription = $('#product_details_mini_description').text();
    var productMiniDescriptionNewHTML = '<input type="text" name="product_mini_description"\
                                                value="'+productMiniDescription+'"\
                                                style="width: 100%;">';
    $('#product_details_mini_description').html(productMiniDescriptionNewHTML);

    var productCategory = $('#product_details_category span').text();
    var productCategoryNewHTML = '';
    $.post("/e_commerce/products/modify_product/get_category_list_as_a_select_list.php",
      { product_category: productCategory },
      function(data) {
        productCategoryNewHTML = 'Catégorie : ' + data;
        $('#product_details_category').html(productCategoryNewHTML);
      }
    );

    var productDescription = $('#product_details_description').text();
    var productDescriptionNewHTML = '<textarea name="product_description"\
                                               style="width: 100%;" rows="5">'
                                       +productDescription+
                                    '</textarea>';
    $('#product_details_description').html(productDescriptionNewHTML);

    var productPrice = $('#product_details_price').text();
    var productPriceNewHTML = '<input type="text" name="product_price" value="'+productPrice+'">';
    $('#product_details_price').html(productPriceNewHTML);

    var productImageLink = $('#product_details_image').children().attr('src');
    var productImageLinkHTML = 'Lien de l\'image : <input type="text" \
                                                          name="product_image_link_field" value="'
                                                          +productImageLink+'" \
                                                          style="margin-top: 15px;">';
    $('#product_details_left_floater').append(productImageLinkHTML);
  });
}


  /*-----------------------------------------
  ----------REFRESH PRODUCT'S IMAGE----------
  -----------------------------------------*/

  function refreshProductImage() {
    $(document).on('keyup', '[name="product_image_link_field"]', function() {
      var productImageLinkFieldValue = $('[name="product_image_link_field"]').val();
      $('#product_details_image img').attr('src', productImageLinkFieldValue);
    });
  }

  /*-----------------------------------------
  ----------VALIDATE MODIFY PRODUCT----------
  -----------------------------------------*/

  function validateModifyProduct() {
    $(document).on('click', '.product_details_validate_modify_product_button', function() {
      var product = {
        'id': parseInt($('.product_details_delete_product_button').attr('id')),
        'name': $('[name="product_name"]').val(),
        'mini_description': $('[name="product_mini_description"]').val(),
        'category': $("select option:selected").val(),
        'description': $('[name="product_description"]').val(),
        'image_link': $('[name="product_image_link_field"]').val(),
        'price': $('[name="product_price"]').val()
      }


      $.post("/e_commerce/products/modify_product/modify_product.php",
        { product: product },
        function(data, status) {
          if (data == 'ok') { // If there is no error
            $('#core_core').empty(); // core_core gets cleaned.
            updateBasketPrice();
            showProductDetails(product.id);
          }
        }
      );
    });
  }

  /*---------------------------------------
  ----------CANCEL MODIFY PRODUCT----------
  ---------------------------------------*/

  function cancelModifyProduct() {
    $(document).on('click', '.product_details_cancel_modify_product_button', function() {
      var productId = parseInt($('.product_details_delete_product_button').attr('id'));
      showProductDetails(productId);
    });
  }


/*----------------------------
------------------------------
--------------MAIN------------
------------------------------
----------------------------*/

$(function() {
  modifyProduct();
  refreshProductImage();
  validateModifyProduct();
  cancelModifyProduct();
});
