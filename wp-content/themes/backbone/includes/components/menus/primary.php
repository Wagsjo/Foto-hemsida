<?php
/*
 * Header primary menu
 */
?>
<nav id="menu-primary" role="navigation">
	<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'backbone' ); ?></a>
	<ul class="menu-main-list">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new BackBone_Mega_Menu_Walker(), 'depth' => 2, 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
	</ul>
</nav>
