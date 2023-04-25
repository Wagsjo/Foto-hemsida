<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<h1><?php _e( 'Search results', 'backbone' ); ?></h1>

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<header>

					<h1><?php the_title(); ?></h1>

					<?php include_once( 'includes/components/content/post-meta.php' ); ?>

				</header>

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>

		<?php endwhile; ?>

		<?php include_once( 'includes/components/content/pagination.php' ); ?>

	<?php else : ?>

		<h1><?php _e( 'No search results', 'backbone' ); ?></h1>

	<?php endif; ?>

<?php get_footer(); ?>
