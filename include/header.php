<span class="simple-tooltip" title="First tooltip">I have a tooltip</span>



<div id="header_wrapper">
	<div id="header">
		<div id="logo_site">
			<img src="http://media.ldlc.com/v3/img/general/logo-ldlc-anim.gif"
			height="76" width="175">
		</div>

		<div id="search_bar">
			<div id="search_bar_glass_container">
				<img id="search_bar_glass" src="http://media.ldlc.com/v3/img/general/moteur/ico-loupe.svg" />
			</div>
			<input id="search_bar_field" type="search" name="search_field" value="Rechercher" onclick="this.value='';"/>
			<div id="search_bar_ok">OK</div>
		</div>

		<div id="right_elements">
			<div class="right_element">
				<div class="element_logo">&nbsp;</div>

				<span class="element_title">Mon compte</span>
				<div id="small_blue_arrow">&nbsp;</div>
				<div class="element_text" onmouseover="tooltip.pop(this, 'Lorem ipsum dolor...mauris')">Se connecter</div>

				<div class="login_tooltip">
					<input type="text" name="password" />
					<br />
					<input type="password" name="password" />
				</div>
			</div>

			<div class="right_element">
				<div class="element_logo">&nbsp;</div>

				<span class="element_title">Mon panier</span>
				<span id="small_blue_arrow">&nbsp;</span>
				<div class="element_text">0 article&nbsp&nbsp&nbsp
					<span style="color: #ff0; font-weight: bold;">0,00 €</span>
				</div>
			</div>				

			<div id="mon_panier">
			</div>
		</div>

		<div id="menu">
			<?php
				require_once $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
				require_once(__DIR__.'/header_functions.php');
				show_menu_elements($bdd);
			?>
		</div>
	</div>
</div>