<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class('wrapper'); ?> id="post-<?php the_ID(); ?>">

			<div class="content-container">
				<div class="content-inner-container">
					<div class="content-wrapper">

					</div>
				</div>
			</div>
asd
			<div class="content-container">
				<div class="content-inner-container">
					<div class="content-wrapper">
						<div class="entry">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>

			<?php locate_template( array( 'includes/acf-sections/sections.php' ), true, true ); ?>

		</article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
