<div class="imageblock">

   <?php $images = get_sub_field("imageblock"); ?>
   
   <?php if( count($images) > 1 ) { ?>

      <div class="swiper bannerSwiper">
         <div class="swiper-wrapper">
         <?php foreach($images as $image) { ?>

            <div class="swiper-slide">
               <img src="<?php echo $image; ?>" alt="">
            </div>

         <?php } ?> 
         </div>
         <!-- If we need pagination -->
         <!-- <div class="swiper-pagination"></div> -->

         <!-- If we need navigation buttons -->
         <div class="swiper-button-prev"></div>
         <div class="swiper-button-next"></div>

         <!-- If we need scrollbar -->
         <!-- <div class="swiper-scrollbar"></div> -->
      </div>

   <?php } else { ?>

      <img src="<?php the_sub_field("imageblock"); ?>" alt="">

   <?php } ?>
   
</div>