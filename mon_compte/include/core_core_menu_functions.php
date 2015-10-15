<?php
	/*---------------------------------------------------
	-----------------------------------------------------
	------------ECHO NEW CORE CORE MENU ELEMENT----------
	-----------------------------------------------------
	---------------------------------------------------*/

	function echo_new_core_core_menu_element($logo_link, $logo_width, $target_link, $element_name,
											 $put_white_line_at_the_end) {
		echo '<div class="core_core_menu_element">
				<div class="core_core_menu_element_logo" style="background: url('.$logo_link.')
					no-repeat 0 0; width: '.$logo_width.';">&nbsp;</div>
				<div class="core_core_menu_element_title">
					<a href="'.$target_link.'">'.$element_name.'</a>
				</div>
			  </div>';

		if ($put_white_line_at_the_end == TRUE) {
			echo '<div class="core_core_menu_white_bar">&nbsp;</div>';
		}
	}

	/*---------------------------------------------------------
	-----------------------------------------------------------
	------------SHOW ADMIN ZONE LINK IF USER IS ADMIN----------
	-----------------------------------------------------------
	---------------------------------------------------------*/

	function show_admin_zone_link_if_user_is_admin($user_is_admin) {
		if ($user_is_admin == TRUE) {
			echo_new_core_core_menu_element('', '33px',
				'/e_commerce/mon_compte/admin_zone/admin_zone.php',
				'<b style="color: red;">Zone admin</b>', FALSE);
		}
	}