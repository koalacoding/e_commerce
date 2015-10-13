<?php
	/*--------------------------------------------------
	----------------------------------------------------
	-----------------ECHO REGISTER FORM-----------------
	----------------------------------------------------
	--------------------------------------------------*/

	function echo_register_form($action_page, $show_email_fields, $error_message, $user_info) {

		echo '<form action="' . $action_page . '" method="post" style="padding: 3%;">';

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
					<input type="radio" name="civility" value="M">M.
					<input type="radio" name="civility" value="Mlle">Mlle
					<input type="radio" name="civility" value="Mme">Mme
					<span class="error_message">' . $error_message['civility'] . '</span>
					<br />';
		}

		echo	'Votre prénom :
				<br />
				<input type="text" name="firstname" value="' . $user_info['firstname'] . '" />
					<span class="error_message">' . $error_message['firstname'] . '</span>
				<br />

				Votre nom :
				<br />
				<input type="text" name="lastname" value="' . $user_info['lastname'] . '"/>
				<?php
					<span class="error_message">' . $error_message['lastname'] . '</span>		
				<br />
				<br />
				<div id="grey_bar">&nbsp;</div>
				<br />
				Votre adresse :
				<br />
				<input type="text" name="adress" value="' . $user_info['adress'] . '"/>
					<span class="error_message">' . $error_message['adress'] . '</span>		
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
				<input type="text" name="postal_code" value="' . $user_info['postal_code'] . '"/>
					<span class="error_message">' . $error_message['postal_code'] . '</span>
				<br />

				Ville :<br />
				<input type="text" name="city" />
				<?php
					echo '<span class="error_message">' . $error_message['city'] . '</span>';
				?>			
				<br /><br />

				Numéros de téléphone pour vous joindre :<br />
				Fixe :<br />
				<input type="text" name="phone_fixe" />
				<?php
					echo '<span class="error_message">' . $error_message['phone_fixe'] . '</span>';
				?>			
				<br />

				Mobile :<br />
				<input type="text" name="phone_mobile" />
				<?php
					echo '<span class="error_message">' . $error_message['phone_mobile'] . '</span>';
				?>			
				<br /><br />

				<div id="grey_bar">&nbsp;</div>
				<br />

				Votre mot de passe :<br />
				<input type="password" name="password" />
				<?php
					echo '<span class="error_message">' . $error_message['password_invalid'] . '</span>';
				?>			
				<br />

				Confirmation :<br />
				<input type="password" name="password_confirmation" />
				<?php
					echo '<span class="error_message">' . $error_message['passwords_dont_match'] .
					 '</span>';
				?>			
				<br /><br />

				<input type="submit" value="OK" />
			</form>
	}
?>