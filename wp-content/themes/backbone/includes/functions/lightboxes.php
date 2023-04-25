<?php

function display_backbone_filter_sidebar(){ ?>
	<div class="sidebar-container filter-container">
		<div class="sidebar-inner">
			<div class="sidebar-header">
				<p class="sidebar-title">Filtrera</p>
			</div>
			<div class="sidebar-main">
				<?php do_action( 'woocommerce_sidebar' );	?>
			</div>
			<div class="sidebar-footer">
			</div>
		</div>
	</div>

	<?php
}
