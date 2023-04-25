<?php
/*
 * Header component
 * One row with logo on left side.
 */
?>

<header id="header" role="banner">
	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">

				<div class="header-main">

					<div class="header-logo">
						<div class="header-logo">
							<a href="<?php echo get_option( 'home' ); ?>" class="logotype">
								<?php
									if ( has_custom_logo() ) {
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
									} else {
										echo '<h1>' . get_bloginfo('name') . '</h1>';
									}
								?>
							</a>
						</div>
					</div>

					<?php get_template_part( 'includes/components/menus/primary' ); ?>

					<div class="header-right">
						<div class="menu-btn open-mobile-menu">
							<div class="bar1"></div>
							<div class="bar2"></div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</header>
<!-- <button class="open-search-bar">
	<span class="icon-search"></span>
	<span class="search-text"><?php _e('SÖK', 'backbone'); ?></span>
</button> -->

<div class="sidebar-container search-container">
	<div class="sidebar-inner top">
		<div class="sidebar-main">
			<div class="content-container">
				<div class="content-inner-container">
					<div class="content-wrapper">
						<?php locate_template( array( 'searchform.php' ), true ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="sidebar-container mobile-menu-container">
	<div class="sidebar-inner right">
		<div class="sidebar-header">
			<!-- <p class="sidebar-title"></p> -->

			<!-- <div class="menu-btn close-mobile-menu">
				<div class="bar1"></div>
				<div class="bar2"></div>
			</div> -->
		</div>
		<div class="sidebar-main">
			<nav class="mobile-menu-nav" role="navigation">
				<ul class="mobile-menu-list">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Backbone_Walker_Mobile(), 'depth'          => 0,'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>
		<div class="sidebar-footer">
		</div>
	</div>
</div>



<?php if ( class_exists( 'WooCommerce' ) ) { ?>
	<div class="sidebar-container minicart-container">
		<div class="sidebar-inner right">
			<div class="sidebar-header">
				<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>
			</div>
			<div class="sidebar-main">
				<?php woocommerce_mini_cart(); ?>
			</div>
			<div class="sidebar-footer">
			</div>
		</div>
	</div>
<?php } ?>
