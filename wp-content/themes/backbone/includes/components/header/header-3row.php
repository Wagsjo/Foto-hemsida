<?php
/*
 * Header component
 */
?>


<div class="header-top">
	<div class="inner wrapper">
		<?php if( $usps = get_field('wamaya_usps_repeater', 'option') ) { ?>
			<ul class="headerUSPs">
				<?php foreach( $usps as $usp ) {
					if( ! $usp['wamaya_usp_show_header'] ){ continue; }
					?>
					<li><span class="dashicons dashicons-yes"></span><?php echo $usp['wamaya_usp_text']; ?>
				<?php	} ?>
			</ul>
		<?php	} ?>
		<!-- <?php include_once( 'menus/top.php' ); ?> -->
	</div>
</div>

<header id="header" role="banner">
	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">

				<div class="header-main">

					<div class="header-left">
						<button class="open-mobile-menu">
							=
						</button>
						<button class="open-search-bar">
							<span class="icon-search"></span>
							<span class="search-text"><?php _e('SÖK', 'backbone'); ?></span>
						</button>

					</div>
					<a href="<?php echo get_option( 'home' ); ?>" class="logotype"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo get_option( 'blogname' ); ?>" /></a>

					<div class="header-right">

					</div>

				</div>

				<?php get_template_part( 'includes/components/menus/primary' ); ?>

			</div>
		</div>
	</div>
</header>


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
	<div class="sidebar-inner">
		<div class="sidebar-header">
			<!-- <p class="sidebar-title"></p> -->
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
				<?php wc_get_template( 'cart/mini-cart.php' ); ?>
			</div>
			<div class="sidebar-footer">
			</div>
		</div>
	</div>
<?php } ?>
