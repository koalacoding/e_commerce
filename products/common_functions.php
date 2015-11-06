<?php
/*--------------------------------------------------------------------
----------------------------------------------------------------------
-----------------PUT EURO SYMBOL AND SUP TAG DECIMALS-----------------
----------------------------------------------------------------------
--------------------------------------------------------------------*/

/* Replace the point of a number string by an euro symbol,
   and put all the decimals between <sup> tags. */
function putEuroSymbolandSupTagDecimals($number) {
	$number = strval($number); // Convert to string.

	if (strpos($number,'.')) { // If the number is a float (i.e. contains a point).
		// Replace the point by an € and put the <sup> tags.
		return str_replace(".", "€<sup>", $number).'</sup>';
	}

	// Return the number without any modification (except that we transformed it into a string).
	return $number.'€';
}
