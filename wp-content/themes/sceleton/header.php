<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header class="header" role="banner">
		<div class="wrapper clearfix">
			<div class="flex-container-header">
				<a href="<?php echo get_option( 'home' ); ?>" class="logotype"><img src="<?php echo get_custom_logo();?></a>
				<nav class="menu-main" role="navigation">
					<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'sceleton' ); ?></a>
					<ul class="menu-main-list clearfix header-list">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Johannes_walker()) ); ?>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<header class="header-mobile" role="banner">
			<div class="flex-container-header">
				<a href="<?php echo get_option( 'home' ); ?>" class="logotype"><img src="<?php echo get_custom_logo();?></a>
				<div class="line-container">
					<span class="line"></span>
				</div>
				<div class="overlay-mobile">
					
					<nav class="menu-main-mobile" role="navigation">
						<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'sceleton' ); ?></a>
						<ul class="menu-main-list-mobile clearfix header-list">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Johannes_Walker_Mobile()) ); ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	

	<div id="content">
