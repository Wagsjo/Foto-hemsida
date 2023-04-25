<?php get_header(); ?>
<h1 class="blandade-uppdrag">BLANDADE UPPDRAG</h1>

<?php $galleri = get_field('galleri'); ?>

	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">
				<div class="entry">
					<section class="gallery-isotope-container">
						<div class="filter-galleri">
							<button data-name-galleri="*" class="isotope-btn">Alla</button>
							<button data-name-galleri=".barn-familj" class="isotope-btn">Barn & familj</button>
							<button data-name-galleri=".brollop" class="isotope-btn">Bröllop</button>
							<button data-name-galleri=".fineart" class="isotope-btn">Fineart</button>
							<button data-name-galleri=".foretag" class="isotope-btn">Företag</button>
							<button data-name-galleri=".portratt" class="isotope-btn">Porträtt</button>
						</div>
						<div class="gallery-grid">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php $prodcat = get_the_category(get_the_ID());
									foreach($prodcat as $asd):
										error_log(print_r($asd->slug, 1 )); ?>
										<div class="gallery-grid-item <?php echo $asd->slug;?>">
									<?php endforeach;?> 

								<a href="<?php echo get_permalink(get_the_id()); ?>">
									<?php echo get_the_post_thumbnail(get_the_id(), 'large'); ?>
									<div class="text-container">
										<p>
											<?php the_title(); ?>
										</p>
									</div>
								</a>
							</div>
							<?php endwhile; endif; ?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<?php locate_template( array( 'includes/acf-sections/sections.php' ), true, true ); ?>




<?php get_footer(); ?>
