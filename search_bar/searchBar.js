/*------------------------------------------------------
--------------------------------------------------------
-----------------SEARCH BAR AUTOCOMPLETE----------------
--------------------------------------------------------
------------------------------------------------------*/

function searchBarAutocomplete() {
  function searchBarResults() {
    var result = [];

    $.post("/e_commerce/search_bar/search_products.php",
      { string: $('#search_bar_field').val() },
      function(data, status) {
        data = JSON.parse(data);

        for (var i = 0; i < data.length; i++) {
          result.push({value: data[i][0], label: data[i][1]});
        }
      }
    );

    $( "#search_bar_field" ).autocomplete({
      source: result,
      select: function( event, ui ) { // When we click on the specific result.
        showProductDetails(ui.item.value);
      }
    });
  }

  $(document).on('keydown keyup', '#search_bar_field', function() {
    searchBarResults();
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
