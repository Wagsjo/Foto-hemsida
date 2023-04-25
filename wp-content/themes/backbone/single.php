
<?php 
get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('wrapper') ?> id="post-<?php the_ID(); ?>">
			<div class="content-container">
				<div class="content-inner-container">
					<div class="content-wrapper">
						<div class="entry">
							
						<?php $gallery = get_field('galleri');?>
						<div class="swiper mySwiper2">
							<div class="swiper-wrapper">
								<?php if($gallery): foreach ($gallery as $img_id => $data): ?>
								<div class="swiper-slide" >
									<?php echo wp_get_attachment_image( $data['id'], array(800, 800) ); ?>
								</div>
								<?php endforeach; endif; ?>
							</div>

							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>

							<div thumbsSlider="" class="swiper mySwiper">
								<div class="swiper-wrapper wrapper-thumbs">
									<?php if($gallery): foreach ($gallery as $img_id => $data): ?>
									<div class="swiper-slide slide-thumbs" >
										<?php echo wp_get_attachment_image( $data['id'], array(300, 300) ); ?>
									</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>

						<div class="nav-links">
							<?php previous_post_link();?>
							<div class="container-back-to-gallery">
								<a href="<?php echo get_post_type_archive_link( 'post' );?>">Tillbaka till galleriet</a>
							</div>
							<?php next_post_link();?>
						</div>
					</div>
				</div>
			</div>
		</article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
