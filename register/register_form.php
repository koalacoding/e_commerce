<?php
	/*--------------------------------------------------------------
	----------------------------------------------------------------
	-----------------INITIALIZE ERROR MESSAGE ARRAY-----------------
	----------------------------------------------------------------
	--------------------------------------------------------------*/

	function initialize_error_message_array() {
		if (isset($_SESSION['error_message'])) {
			$error_message = $_SESSION['error_message'];
		}

		else {
			$error_message = array();
			$error_message['email_invalid'] = $error_message['email_already_used'] =
			$error_message['emails_dont_match'] = $error_message['civility'] =
			$error_message['firstname'] = $error_message['firstname'] =
			$error_message['lastname'] = $error_message['adress'] =
			$error_message['postal_code'] = $error_message['city'] =
			$error_message['phone_fixe'] = $error_message['phone_mobile'] =
			$error_message['password_invalid'] = $error_message['passwords_dont_match'] = '';
		}

		return $error_message;
	}

	/*-----------------------------------------------------------
	-------------------------------------------------------------
	-----------------RETURN ARRAY ENTRY IF ISSET-----------------
	-------------------------------------------------------------
	-----------------------------------------------------------*/

	function return_array_entry_if_isset($array, $key) {
		if (isset($array[$key])) {
			return $array[$key];
		}

		return '';
	}

	/*--------------------------------------------------
	----------------------------------------------------
	-----------------ECHO REGISTER FORM-----------------
	----------------------------------------------------
	--------------------------------------------------*/

	function echo_register_form($show_email_fields, $show_civility_checkboxes,
								$show_country_select_list, $error_message, $user_info,
								$show_password_fields) {
		if ($show_email_fields) {
			echo 'Votre adresse e-mail :<br />
					<input type="text" name="email" style="width: 35%;"/>
					<span class="error_message">' .
						$error_message['email_invalid'] . $error_message['email_already_used'] .
					'</span>
					<br />
					Confirmez votre email :
					<br />
					<input type="text" name="email_confirmation" style="width: 35%;"/>
					<span class="error_message">' . $error_message['emails_dont_match'] . '</span>
					<br />
					<br />
					<div id="grey_bar">&nbsp;</div>
					<br />';
		}

		if ($show_civility_checkboxes) {
			echo   'Votre civilité :
					<br />
					<input type="radio" name="civility" value="M" checked>M.
					<input type="radio" name="civility" value="Mlle">Mlle
					<input type="radio" name="civility" value="Mme">Mme
					<span class="error_message">' . $error_message['civility'] . '</span>';
		}

		  echo '<br />
				Votre prénom :
				<br />
				<input type="text" name="firstname" value="' .
					return_array_entry_if_isset($user_info, 'firstname') . '" />
					<span class="error_message">' . $error_message['firstname'] . '</span>
				<br />

				Votre nom :
				<br />
				<input type="text" name="lastname" value="' .
					return_array_entry_if_isset($user_info, 'lastname') . '"/>
					<span class="error_message">' . $error_message['lastname'] . '</span>
				<br />
				<br />
				<div id="grey_bar">&nbsp;</div>
				<br />
				Votre adresse :
				<br />
				<input type="text" name="adress" value="' .
					return_array_entry_if_isset($user_info, 'adress') . '"/>
					<span class="error_message">' . $error_message['adress'] . '</span>		
				<br />';

		if ($show_country_select_list) {
			echo'<select name="country">
				    <option value="France" selected>France</option>
				    <option value="Belgique">Belgique</option>
				</select>	
				<br />';
		}

			echo 'Code postal :
				<br />
				<input type="text" name="postal_code" value="' .
					return_array_entry_if_isset($user_info, 'postal_code') . '"/>
					<span class="error_message">' . $error_message['postal_code'] . '</span>
				<br />

				Ville :
				<br />
				<input type="text" name="city" value="' .
					return_array_entry_if_isset($user_info, 'city') . '"/>
					<span class="error_message">' . $error_message['city'] . '</span>			
				<br />
				<br />

				Numéros de téléphone pour vous joindre :
				<br />
				Fixe :
				<br />
				<input type="text" name="phone_fixe" value="' .
					return_array_entry_if_isset($user_info, 'phone_fixe') . '"/>
					<span class="error_message">' . $error_message['phone_fixe'] . '</span>		
				<br />

				Mobile :
				<br />
				<input type="text" name="phone_mobile" value="' .
					return_array_entry_if_isset($user_info, 'phone_mobile') . '"/>
					<span class="error_message">' . $error_message['phone_mobile'] . '</span>
				<br />
				<br />
				<div id="grey_bar">&nbsp;</div>
				<br />';

		if ($show_password_fields) {
			echo   'Votre mot de passe :
					<br />
					<input type="password" name="password" />
					<span class="error_message">' . $error_message['password_invalid'] . '</span>
					<br />
					Confirmation :
					<br />
					<input type="password" name="password_confirmation" />
						<span class="error_message">' . $error_message['passwords_dont_match'] .
						 '</span>		
					<br />
					<br />';
		}

			echo '<input type="submit" value="OK" />
				  </form>';
	}
?>