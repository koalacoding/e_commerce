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
          result.push(data[i][1]);
        }
      }
    );

    $( "#search_bar_field" ).autocomplete({
      source: result
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
