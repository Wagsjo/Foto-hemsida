<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('wrapper') ?>>
			<header>
				<h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
			</header>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile; ?>

	<?php include_once( 'includes/components/content/pagination.php' ); ?>

<?php else : ?>

	<h1><?php _e( 'No posts', 'backbone' ); ?></h1>

<?php endif; ?>

<?php get_footer(); ?>
