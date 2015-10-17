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
		$('#email_is_already_used').load('check_if_email_is_already_used.php?email='
												 + $(this).val(), function() {
			if ($('#email_is_already_used').html() == 'TRUE') {
				$('#error_message_email_already_used').html('Email déjà utilisé');
			}

			else {
				$('#error_message_email_already_used').html('');
			}
		});
	});
}

/*----------------------------------------------------------------------
------------------------------------------------------------------------
-----------------HANDLE STRINGS DONT MATCH ERROR MESSAGE----------------
------------------------------------------------------------------------
----------------------------------------------------------------------*/

function handle_strings_dont_match_error_message(string) {
	// When pressing a key in the target fields.
	$('[name="'+string+'"], [name="'+string+'_confirmation"]').keyup(function() {
		// If what the user typed in "string" and "string confirmation" are not the same.
		if ($('[name="'+string+'"]').val() != $('[name="'+string+'_confirmation"]').val()) {
			$('#error_message_'+string+'s_dont_match')
				.html('Les '+string+'s ne sont pas identiques');
		}

		else {
			$('#error_message_'+string+'s_dont_match').html('');
		}
	});
}

/*-----------------------------------------------------------------
-------------------------------------------------------------------
-----------------CHECK IF THERE IS ANY ERROR MESSAGE---------------
-------------------------------------------------------------------
-----------------------------------------------------------------*/

function check_if_there_is_any_error_message() {
	var error = false;

	$('.error_message').each(function() {
		if ($(this).text() != '') {
			error = true;
		}
	});

	return error;
}

/*------------------------------------------------------------------------
--------------------------------------------------------------------------
-----------------ACTIVATE SUBMIT BUTTON IF NO ERROR MESSAGE---------------
--------------------------------------------------------------------------
------------------------------------------------------------------------*/

function activate_submit_button_if_no_error() {
	$(document).keyup(function() {
		if (check_if_there_is_any_error_message() == false) {
			$('#submit_button').prop('disabled', false);
		}

		else { // If there is any error message.
			$('#submit_button').prop('disabled', true);
		}
	});
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

$(function() {
	handle_email_is_already_used_error_message();
	handle_strings_dont_match_error_message('email');
	handle_error_message ('email', "^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z]{1,7}$",
						  'E-mail invalide');	
	handle_error_message ('firstname', "^[a-zA-Z-éèàê' ]{2,30}$", 'Prénom invalide');
	handle_error_message ('lastname', "^[a-zA-Z-éèàê' ]{2,30}$", 'Nom invalide');
	handle_error_message ('adress', "^[a-zA-Z0-9-éèàê' ]{2,50}$", 'Adresse invalide');
	handle_error_message ('postal_code', "^[0-9-]{3,10}$", 'Code postal invalide');
	handle_error_message ('city', "^[a-zA-Z-éèàê' ]{2,30}$", 'Ville invalide');
	handle_error_message ('phone_fixe', "^[0-9- ]{4,14}$", 'Téléphone fixe invalide');
	handle_error_message ('phone_mobile', "^[0-9- ]{4,14}$", 'Téléphone mobile invalide');
	handle_error_message ('password', "^[a-zA-Z0-9-_]{2,30}$", 'Mot de passe invalide');
	handle_strings_dont_match_error_message('password');

	activate_submit_button_if_no_error();
});