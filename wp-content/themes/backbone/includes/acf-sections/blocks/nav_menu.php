<?php 
   $menu_data = get_sub_field('nav_menu');
   $header = get_sub_field('header');
   $icon = ( get_sub_field('icon') ) ? '<img src="'.get_sub_field('icon')['url'].'" />' : '';
   if(!empty($menu_data)){
      ?>
      <h3 class="column-header"><?php echo $icon . $header; ?></h3>
      <nav class="" role="navigation">
         <a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'backbone' ); ?></a>
         <ul class="menu-main-list">
            <?php wp_nav_menu( array( 'theme_location' => $menu_data['value'], 'depth' => 2, 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
         </ul>
      </nav>
      <?php
   }
?>

