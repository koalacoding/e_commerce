<?php
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

	function echo_register_form($action_page, $show_email_fields, $show_civility_checkboxes,
								$show_country_select_list, $user_info, $show_password_fields) {
		echo '<form action="'.$action_page.'" method="post" style="padding: 3%;">';

		if ($show_email_fields) {
			echo 'Votre adresse e-mail :<br />
				  <input type="text" name="email" style="width: 35%;"/>
				  <span class="error_message" id="error_message_email">Email invalide</span>
				  <span class="error_message" id="error_message_email_already_used"></span>
				  <span id="email_is_already_used" style="visibility: hidden;"></span>
				  <br />
				  Confirmez votre email :
				  <br />
				  <input type="text" name="email_confirmation" style="width: 35%;"/>
				  <span class="error_message" id="error_message_emails_dont_match"></span>
				  <br />
				  <br />
				  <div class="grey_bar">&nbsp;</div>
				  <br />';
		}

		echo 'Votre civilité :
			  <br />
			  <input type="radio" name="civility" value="M" checked>M.
			  <input type="radio" name="civility" value="Mlle">Mlle
			  <input type="radio" name="civility" value="Mme">Mme
			  <br />
			  Votre prénom :
			  <br />
			  <input type="text" name="firstname" value="' .
				return_array_entry_if_isset($user_info, 'firstname') . '" />
			  <span class="error_message" id="error_message_firstname">Prénom invalide</span>
			  <br />

			  Votre nom :
			  <br />
			  <input type="text" name="lastname" value="' .
				return_array_entry_if_isset($user_info, 'lastname') . '"/>
			  <span class="error_message" id="error_message_lastname">Nom invalide</span>
			  <br />
			  <br />
			  <div class="grey_bar">&nbsp;</div>
			  <br />
			  Votre adresse :
			  <br />
			  <input type="text" name="adress" value="' .
				return_array_entry_if_isset($user_info, 'adress') . '"/>
			  <span class="error_message" id="error_message_adress">Adresse invalide</span>		
			  <br />
			  Pays :
			  <br />
			  <select name="country">
			  <option value="France" selected>France</option>
			  <option value="Belgique">Belgique</option>
			  </select>	
			  <br />
			  Code postal :
			  <br />
			  <input type="text" name="postal_code" value="' .
					 return_array_entry_if_isset($user_info, 'postal_code') . '"/>
			  <span class="error_message" id="error_message_postal_code">
			  Code postal invalide
			  </span>
			  <br />
			  Ville :
			  <br />
			  <input type="text" name="city" value="' .
					 return_array_entry_if_isset($user_info, 'city') . '"/>
			  <span class="error_message" id="error_message_city">Ville invalide</span>			
			  <br />
			  <br />

			  Numéros de téléphone pour vous joindre :
			  <br />
			  Fixe :
			  <br />
			  <input type="text" name="phone_fixe" value="' .
					 return_array_entry_if_isset($user_info, 'phone_fixe') . '"/>
			  <span class="error_message" id="error_message_phone_fixe">
			  	Téléphone fixe invalide
			  </span>		
			  <br />

			  Mobile :
			  <br />
			  <input type="text" name="phone_mobile" value="' .
					 return_array_entry_if_isset($user_info, 'phone_mobile') . '"/>
			  <span class="error_message" id="error_message_phone_mobile">
			  	Téléphone mobile invalide
			  </span>
			  <br />
			  <br />
			  <div class="grey_bar">&nbsp;</div>
			  <br />';

		if ($show_password_fields) {
			echo 'Votre mot de passe :
				  <br />
				  <input type="password" name="password" />
				  <span class="error_message" id="error_message_password">
				  	Mot de passe invalide
				  </span>
				  <br />
				  Confirmation :
				  <br />
				  <input type="password" name="password_confirmation" />
				  <span class="error_message" id="error_message_passwords_dont_match"></span>		
				  <br />
				  <br />';
		}

		echo '<input id="submit_button" type="submit" value="OK" disabled/>
			  </form>
			  <script
			  	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js">
			  </script>
			  <script src="register_form.js"></script>';
	}
?>