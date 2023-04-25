<div class="sliderblock">

	<?php if( have_rows('slider_repeater') ) { ?>
		<div class="swiper bannerSwiper">
			<div class="swiper-wrapper">
				<?php while( have_rows('slider_repeater') ) { the_row(); ?>
					<?
						$image = get_sub_field('slider_image');
						$image_mobile = get_sub_field('slider_image_mobile');
						$overlay = get_sub_field('slider_overlay');
						$text = get_sub_field('slider_text');
						$vertical_pos_class = "v-" . get_sub_field('slider_vertical_text_pos');
						$horizontal_pos_class = "h-" . get_sub_field('slider_horizontal_text_pos');
						$link = get_sub_field('slider_link');

					?>
					<div class="swiper-slide">
						<? if( $link ){ ?><a href="<?= $link; ?>" class="slider-link"><? } ?>
							<img src="<?php echo $image['url']; ?>" alt="">
							<div class="slider-overlay">
								<div class="slider-text <?= $vertical_pos_class; ?> <?= $horizontal_pos_class; ?>">
									<?= $text; ?>
								</div>
							</div>
						<? if( $link ){ ?></a><? } ?>
					</div>

				<?php } ?>
			</div>
			<div class="swiper-pagination"></div>

			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>

			<!-- If we need scrollbar -->
			<!-- <div class="swiper-scrollbar"></div> -->
		</div>

	<?php } ?>









</div>
