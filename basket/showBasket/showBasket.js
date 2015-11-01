/*----------------------------------------------------
------------------------------------------------------
-----------------SHOW BASKET ON CLICK-----------------
------------------------------------------------------
----------------------------------------------------*/

function showBasket() {
	$('#rightElementBasket').click(function() {
		$.post("/e_commerce/basket/showBasket/showBasket.php",
		  function(data, status) {
        $('#core_core').empty(); // To clean the core_core is there is already shown content.
    		$('#core_core').append(data);
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
	showBasket();
});
