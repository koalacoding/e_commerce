/*------------------------------------------------
--------------------------------------------------
-----------------ADD MENU ELEMENT-----------------
--------------------------------------------------
------------------------------------------------*/

function addMenuElement() {
	$('#submitButtonAdd').click(function() {
		// If there are less than 10 members of the menu_element class.
		if ($('.menu_element').length < 10) {
			var htmlContent = "<div name='"+$('[name="menuNameAdd"]').val().toLowerCase()+"' \
												  class='menu_element'> \
			   		<div class='menu_element_title'>"+$('[name="menuNameAdd"]').val().toLowerCase()+"</div> \
					<div class='menu_element_white_arrow'> \
						<img src='http://media.ldlc.com/v3/img/general/ico-triangle-bas.gif' \
							 alt='white_arrow' /> \
					</div> \
			   	</div>";

			if ($('.menu_element').length > 0) { // If there is at least one menu element.
				// Add the new menu element after the last one already existing.
				$('.menu_element').last().after(htmlContent);
			}

			else { // If there is no menu element.
				$('#menu').append(htmlContent);
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
		$('[name="'+menuName+'"]').remove();
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

		$('.menu_element').each(function() {
			// Pushing into the menuList array the name of every menu_element.
			menuList.push($(this).attr('name'));
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
	    	if (data == 'ok') {
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

