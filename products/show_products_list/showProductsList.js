/*-------------------------------------------------
---------------------------------------------------
-----------------HANDLE MENU CLICK-----------------
---------------------------------------------------
-------------------------------------------------*/

function handleMenuClick() {
	$('.header_menu_element').click(function() {
		var menuName = $(this).attr('id');

		$.post("/e_commerce/products/show_products_list/show_products_list.php",
        {
            menu: menuName
        },
        function(data, status) {
            $('#core').empty(); // To clean the core_core is there is content in it.
    				$('#core').append(data);
            $('.productQuantitySpinnerInput').spinner({min: 1, max: 999});
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
    handleMenuClick();
});
