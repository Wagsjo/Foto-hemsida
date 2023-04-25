<?php 
   $post_data = get_sub_field('posts');
   $header = get_sub_field('header');
   $icon = ( get_sub_field('icon') ) ? '<img src="'.get_sub_field('icon')['url'].'" />' : '';
   if(!empty($post_data)){
      ?>
         <h3 class="column-header"><?php echo $header . $icon; ?></h3>
         <div class="footer-news-wrapper">
            <?php foreach($post_data as $post): setup_postdata( $post ); ?>
               <div class="footer-news-container">
                  <?php if ( has_post_thumbnail() ) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail(); ?>
                     </a>
                  <?php endif; ?>
                  <h2><?php echo $post->post_title; ?></h2>
               </div>
            <?php endforeach; wp_reset_postdata(); ?>
         </div>
         
      <?php
   }
?>

