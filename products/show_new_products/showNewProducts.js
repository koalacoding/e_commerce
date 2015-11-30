/*-----------------------------------------
-------------------------------------------
--------------SHOW NEW PRODUCTS------------
-------------------------------------------
-----------------------------------------*/

function showNewProducts() {
  $.post("/e_commerce/products/show_new_products/show_new_products.php",
    function(data) {
      $('#core').empty(); // To clean the core_core if there is content in it.
      $('#core').append(data);
    }
  );
}


/*----------------------------
------------------------------
--------------MAIN------------
------------------------------
----------------------------*/

$(function() {
  $(document).on('click', '#logo_site', function() {
    showNewProducts();
  });

  showNewProducts();
});
