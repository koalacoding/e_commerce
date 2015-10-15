/*-------------------------------------------------------------
---------------------------------------------------------------
-----------------CHECK IF STRING MATCHES REGEX-----------------
---------------------------------------------------------------
-------------------------------------------------------------*/

function check_if_string_match_regex(regex, string) {
	if (regex.test(string)) {
		return true;
	}

	return false;
}

/*----------------------------------------------------
------------------------------------------------------
-----------------HANDLE ERROR MESSAGE-----------------
------------------------------------------------------
----------------------------------------------------*/

function handle_error_message (input, regex, error_message) {
	// If any key is pressed while in the input.
	$('[name="' + input + '"]').keyup(function() {
		// If the user enters a correct string.
		if (check_if_string_match_regex(new RegExp(regex), $(this).val())) {
			$('#error_message_' + input).html('');
		}

		else { // We show an error message.
			$('#error_message_' + input).html(error_message);
		}
	});
}

/*--------------------------------------------------------------------------
----------------------------------------------------------------------------
-----------------HANDLE EMAIL IS ALREADY USED ERROR MESSAGE-----------------
----------------------------------------------------------------------------
--------------------------------------------------------------------------*/

function handle_email_is_already_used_error_message() {
	$('[name="email"]').keyup(function() {
		/* We get a string, 'TRUE' or 'FALSE',
		   depending if the email the user entered is already used or not.
		   We store the string in a hidden span. */
		$('[name="email_is_already_used"]').load('check_if_email_is_already_used.php?email='
												 + $(this).val(), function() {
			if ($('[name="email_is_already_used"]').html() == 'TRUE') {
				$('#error_message_email_already_used').html('Email déjà utilisé');
			}

			else {
				$('#error_message_email_already_used').html('');
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
	handle_email_is_already_used_error_message();
	handle_error_message ('email', "^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z]{1,7}$",
						  'E-mail invalide');	
	handle_error_message ('firstname', "^[a-zA-Z-éèàê' ]{2,30}$", 'Prénom invalide');
});