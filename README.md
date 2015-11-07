# e_commerce
E-commerce interface coded with HTML5, CSS3, PHP and jQuery.
Tested with Google Chrome Version 46.0.2490.80 m.

## Steps finished.
* Added jQuery auto-complete civility and country in /mon_compte/vos_informations.php.
* Only allow users that are admins in the admin zone.
* Add an interface using jQuery in the admin zone allowing to delete and add a header menu.
  Minimum number of menu buttons will be 0, and the maximum will be set to prevent a design break.
* Added an interface in the admin zone allowing an admin to add a new product.
* Allow an admin to put a product in a specific menu.
* When clicking on a menu, show all the products belonging to this menu.
* Added a basket system.
* Added a page to see basket details.
* It is now possible to delete a single product from the basket.
* Added pop-up confirmation when dumping the basket or a basket's product.
* Handle a design problem in the basket view where the name of the product get on multiple lines.
* Code the search bar to dynamically display results using jQuery.
* Show decimals of prices in "show_products_list".
* Basket price and number of products is now correctly displayed while navigating
  through the account's pages.
* Admins can now add pictures to products.
* Users can now click on a search bar result to see its details.
* The search bar only starts to show results after at least 3 characters have been typed
  in the bar.
* Improved "style.css" organization.
* The user can now go on a product's page by clicking on a product's image or name
  in the products list.
* Fixed a design problem in /basket/showBasket/showBasket.php.
* Fixed #login_tooltip_access_member_zone_button design.
* Fixed "productQuantitySpinner" margin-right.
* After clicking on a search bar result, the search bar value is now reinitialized.
* Added the product's image in showBasket.
* Added a button to confirm the command in the bottom of showBasket.
* Added the basket total in a bar in the bottom of /basket/showBasket/showBasket.php.
* Added a mouse pointer when hovering over product's image or name in the products list.
* When deleting a product in the basket, the bottom total basket price is now updated.
* Enhanced the ui-spinner margin-right in /products/show_products_list/show_products_list.php.
* All the core's content (even a top bar) is now emptied when showing the basket
  or the products list.
* Core's content is now also emptied when showing a product's details.
* Admins can now delete a product.
* When an admin deletes a product, if an user had the product in his basket,
  the number of items in his basket is now updated.
* Admins can now modify a product dynamically on a product's details page.

## To do.
