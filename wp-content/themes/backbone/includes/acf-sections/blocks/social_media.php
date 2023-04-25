<?php 
   $header = get_sub_field('header');
   $social_media = get_sub_field('social_media');
   if(!empty($social_media)){
      ?>
         <div class="footer-social-wrapper">
            <h3 class="column-header"><?php echo $header; ?></h3>
            <div class="icons-wrapper">
               <?php foreach($social_media as $media): error_log(print_r($media ,1)); ?>
                  <div class="footer-social-container">
                     <a href="<?php echo $media['url']; ?>" target="_blank"><img src="<?php echo $media['icon']['url']; ?>" /></a>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         
      <?php
   }
?>

