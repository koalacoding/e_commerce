/*-------------------------------------------------
---------------------------------------------------
-----------------HANDLE MENU CLICK-----------------
---------------------------------------------------
-------------------------------------------------*/

function handleMenuClick() {
	$('.menu_element').click(function() {
		var menuName = $(this).attr('id');

		$.post("getProducts/getProducts.php",
        {
            menu: menuName
        },
        function(data, status){
            $('#core_core').empty(); // To clean the core_core is there are already shown products.
    		$('#core_core').append(data);
            $('.productQuantitySpinnerInput').spinner({min: 1, max: 999});
        });
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
