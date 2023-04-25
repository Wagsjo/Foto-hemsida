<div class="buttonrow">
   
   <?php if( have_rows('buttons_repeater') ) { ?>
   
      <?php while( have_rows('buttons_repeater') ) { the_row(); ?>
   
         <?php
         $button_text = get_sub_field('button_text');
         $button_link = get_sub_field('button_link');
         ?>
   
         <div class="button">
            <a href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
         </div>
   
      <?php } ?>
   
   <?php } ?>

</div>
