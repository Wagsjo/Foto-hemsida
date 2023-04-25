<?php
/*
 * Header menu
 */
?>
<nav id="menu-header" role="navigation">
	<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'backbone' ); ?></a>
	<ul class="menu-header-list clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
	</ul>
</nav>
