<div id="core">
	<?php
		if ($activate_core_core_top_bar == TRUE) {
			echo '<div id="core_core_top_bar">
					<div id="core_core_top_bar_part1">' . $top_bar_text[0] . '</div>
					<div id="core_core_top_bar_part2">' . $top_bar_text[1] . '</div>
				  </div>';
		}
	?>
	<div id="core_core" <?php if ($activate_core_core_top_bar == FALSE) {
	 						echo 'style="border: 1px solid #c8c8c8;"';} ?>>