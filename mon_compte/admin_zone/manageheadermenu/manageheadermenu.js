/*------------------------------------------------
--------------------------------------------------
-----------------ADD MENU ELEMENT-----------------
--------------------------------------------------
------------------------------------------------*/

function addMenuElement() {
	$('#submitButtonAdd').click(function() {
		// If there are less than 10 members of the menu_element class.
		if ($('.header_menu_element').length < 10) {
			var htmlContent =
				"<div class='header_menu_element' id='"+$('[name="menuNameAdd"]').val().toLowerCase()+"'> \
			     <div class='header_menu_element_title'>"+$('[name="menuNameAdd"]').val().toLowerCase()+"</div> \
					 <div class='header_menu_element_white_arrow'> \
				   	<img src='/e_commerce/images/white_arrow.png' alt='white_arrow' /> \
					 </div> \
				 </div>";

			if ($('.header_menu_element').length > 0) { // If there is at least one menu element.
				// Add the new menu element after the last one already existing.
				$('.header_menu_element').last().after(htmlContent);
			}

			else { // If there is no menu element.
				$('#header_menu').append(htmlContent);
			}
		}
	});
}

/*---------------------------------------------------
-----------------------------------------------------
-----------------REMOVE MENU ELEMENT-----------------
-----------------------------------------------------
---------------------------------------------------*/

function removeMenuElement() {
	$('#submitButtonRemove').click(function() {
		var menuName = $('[name="menuNameRemove"]').val().toLowerCase();

		if ($.trim(menuName).length > 0) { // If menuName is longer than
			$('#'+menuName).remove();
		}
	});
}

/*---------------------------------------------------
-----------------------------------------------------
-----------------SEND NEW MENU-----------------
-----------------------------------------------------
---------------------------------------------------*/

// Send the new menu data to the .php that will add it to the SQL database.
function updateMenu() {
	var menuList = [];

	$("#submitModifications").click(function(){
		menuList = [];

		$('.header_menu_element').each(function() {
			// Pushing into the menuList array the id of every menu_element.
			menuList.push($(this).attr('id'));
		});

		if (menuList.length == 0) {
			/* If the menu is empty, we will send this 'clearAll' code
			   to signal the updateMenu.php to only delete every row in the "menu" table,
			   as there is no need to add anything in the table. */
			menuList.push('clearTable');
		}

	    $.post("updateMenu.php",
	    {
	        menuList: menuList
	    },
	    function(data, status){
	    	if (data == 1) {
	    		alert('Menu actualisé avec succès');
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
	addMenuElement();
	removeMenuElement();
	updateMenu();
});
