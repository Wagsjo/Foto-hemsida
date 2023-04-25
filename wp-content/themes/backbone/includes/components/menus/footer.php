<?php
/*
 * Footer menu
 */
?>
<nav id="menu-footer" role="navigation">
	<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'backbone' ); ?></a>
	<ul class="menu-footer-list clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
	</ul>
</nav>
