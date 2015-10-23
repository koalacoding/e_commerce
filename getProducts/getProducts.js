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
        	if (data != '') {
                $('#core_core').empty(); // To clean the core_core is there are already shown products.
        		$('#core_core').append(data);
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
    handleMenuClick();  
});