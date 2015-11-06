/*------------------------------------------------------
--------------------------------------------------------
-----------------SEARCH BAR AUTOCOMPLETE----------------
--------------------------------------------------------
------------------------------------------------------*/

function searchBarAutocomplete() {
  $( "#search_bar_field" ).autocomplete({
    delay: 0,
    source: function(request, response) {
      if ($('#search_bar_field').val().length > 2) {
        var result = [];
        $.post("/e_commerce/search_bar/search_products.php",
          { string: $('#search_bar_field').val() },
          function(data, status) {
            data = JSON.parse(data);

            for (var i = 0; i < data.length; i++) {
              result.push({value: data[i][0], label: data[i][1]});
            }

            response(result);
          }
        );
      }
    },
    select: function( event, ui ) { // When we click on the specific result.
      showProductDetails(ui.item.value);
    }
  });
}

/*-----------------------------------
-------------------------------------
-----------------MAIN----------------
-------------------------------------
-----------------------------------*/

$(function() {
  searchBarAutocomplete();
});
