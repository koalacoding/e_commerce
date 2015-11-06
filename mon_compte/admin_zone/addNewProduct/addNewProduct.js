/*-----------------------------------------------------------------
-------------------------------------------------------------------
-----------------HANDLE PRODUCT NAME ERROR MESSAGE-----------------
-------------------------------------------------------------------
-----------------------------------------------------------------*/

function handleProductNameErrorMessage() {
	$('[name="productName"]').keyup(function() {
		// If what the user entered in the "productName" is not at least 1 character long.
		if ($(this).val().length < 1) {
			$('#productNameErrorMessage').text('Nom invalide');
		}

		else { // If the named entered is at least 1 character long.
			$('#productNameErrorMessage').text('');
		}
	});
}

/*------------------------------------------------------------------
--------------------------------------------------------------------
-----------------HANDLE PRODUCT PRICE ERROR MESSAGE-----------------
--------------------------------------------------------------------
------------------------------------------------------------------*/

function handleProductPriceErrorMessage() {
	$('[name="productPrice"]').keyup(function() {
		// If what the user entered in the "productPrice" field is not numeric.
		if (!$.isNumeric($(this).val())) {
			$('#productPriceErrorMessage').text('Prix invalide');
		}

		else { // If the price entered is correct.
			$('#productPriceErrorMessage').text('');
		}
	});
}

/*--------------------------------------------------------------------
----------------------------------------------------------------------
-----------------HANDLE SUBMIT FORM BUTTON ACTIVATION-----------------
----------------------------------------------------------------------
--------------------------------------------------------------------*/

// Disable the submitFormButton if there is any error. If there is no error, it gets activated.
function handleSubmitFormButtonActivation() {
	var error = false;

	$(document).keyup(function() {
		error = false;

		$('.error_message').each(function() {
			if ($(this).text().length > 0) { // If there is any error message.
				error = true;
				return false; // To break out of the .each iterations.
			}
		});

		error ? $('#submitFormButton').prop('disabled', true)
			  : $('#submitFormButton').prop('disabled', false);
	});
}

/*--------------------------------------------------------------------
----------------------------------------------------------------------
-----------------ADD NEW PRODUCT TO DB WHEN SUBMITTED-----------------
----------------------------------------------------------------------
--------------------------------------------------------------------*/

function addNewProductToDBwhenSubmitted() {
	$('#submitFormButton').click(function() {
		var productName = $('[name="productName"]').val();
		var productMiniDescription = $('#product_mini_description').val();
		var productDescription = $('#product_description').val();
		var product_image_link = $('[name="product_image_link"]').val();
		var productPrice = $('[name="productPrice"]').val();
		var productCategory = $("select option:selected").val();

    $.post("addNewProductAction.php",
    {
        productName: productName,
				product_mini_description: productMiniDescription,
        product_description: productDescription,
				product_image_link: product_image_link,
        productPrice: productPrice,
        productCategory: productCategory
    },
    function(data, status){
    	if (data == 1) {
    		alert('Produit ajouté avec succès');
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
	handleProductNameErrorMessage();
	handleProductPriceErrorMessage();
	handleSubmitFormButtonActivation();
	addNewProductToDBwhenSubmitted();
});
