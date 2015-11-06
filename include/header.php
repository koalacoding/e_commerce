<div id="header_wrapper">
	<div id="header">
		<div id="logo_site">
			<a href="/e_commerce/index.php">
				<img src="http://media.ldlc.com/v3/img/general/logo-ldlc-anim.gif"
				height="76" width="175" alt="logo">
			</a>
		</div>

		<div id="search_bar">
			<div id="search_bar_glass_container">
				<img id="search_bar_glass"
					 src="http://media.ldlc.com/v3/img/general/moteur/ico-loupe.svg"
					 alt="search_bar_glass">
			</div>
			<input id="search_bar_field" type="text" name="search_field" value="Rechercher"
				   onclick="this.value='';">
			<div id="search_bar_ok">OK</div>
		</div>

		<div id="right_elements">
			<div class="header_right_element">
				<div class="elementLogoAccount">&nbsp;</div>

				<span class="element_title">Mon compte</span>
				<div class="small_blue_arrow">&nbsp;</div>
				<div class="element_text">
				<?php
					require_once(__DIR__.'/header_functions.php');

					if (isset($_SESSION['email'])) {
						echo_user_civility_and_lastname($_SESSION['email']);
					}

					else {
						echo 'Se connecter';
					}
				?>
				</div>

				<div class="login_tooltip">
					<?php
						if (isset($_SESSION['email'])) {
							show_connected_login_tooltip();
						}

						else {
							show_not_connected_login_tooltip();
						}
					?>
				</div>
			</div>

			<div class="header_right_element" id="rightElementBasket" style="cursor: pointer;">
				<div class="elementLogoBasket">&nbsp;</div>
				<span class="element_title">Mon panier</span>
				<span class="small_blue_arrow">&nbsp;</span>
				<div class="element_text">
					<span id="nbOfProductsInBasket">0 article</span><br />
					<span class="basketPrice">0,00 €</span>
				</div>
			</div>
		</div>

		<div id="header_menu">
			<?php show_menu_elements(); ?>
		</div>
	</div>
</div>
