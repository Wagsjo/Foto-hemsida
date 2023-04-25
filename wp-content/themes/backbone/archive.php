<?php get_header(); ?>
<?php
	$category = get_queried_object();
	$taxonomy = $category->taxonomy;
	$term_id = $category->term_id;  
	$kategori_galleri = get_field('kategori_galleri', $taxonomy . '_' . $term_id);
	$kategori_text = get_field('kategori_text', $taxonomy . '_' . $term_id);
	$paket = get_field('paket', $taxonomy . '_' . $term_id);

?>
<section>
	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">
				<div class="swiper swiper-category">
					<div class="swiper-wrapper swiper-wrapper-category">
						<?php if($kategori_galleri): foreach($kategori_galleri as $bild => $data): ?>
						<div class="swiper-slide">
							<?php echo wp_get_attachment_image($data['id'], array(800, 800)); ?>
						</div>
						<?php endforeach; endif;?>
					</div>
				</div>
			<p class="cat-text"> <?php echo $kategori_text; ?> </p>

			<?php 
				if( $paket):
					echo '<ul class="slides">';
					foreach( $paket as $row ):
						$tit = $row['paket_titel'];
						$innehall = $row['paket_innehall'];
						$pris = $row['paket_pris'];
						echo '<li class="slides-list-item">';
						// error_log(print_r($row['paket_titel'], 1));
						echo '<h2>' . $tit . '</h2>';
						echo  '<p>Kostnad: ' . $pris . '</p>';
						echo $innehall;
						echo '</li>';
					endforeach;
					echo '</ul>';
				endif;?>

				<?php 
					$args = array('category' => $category->term_id);
					$more_posts = get_posts($args);
					error_log(print_r($more_posts, 1));
				?> 
				<h2 class="header-more-galleries">Gallerier</h2>
				<div class="container-more-galleries">
					<?php foreach($more_posts as $one_post): ?>
						<a class="card-more-galleries" href="<?php echo get_permalink($one_post->ID) ?>">
							<div class="img-container-more-galleries">
								<?php echo get_the_post_thumbnail($one_post->ID, 'large'); ?>
							</div>
							<div class="text-container-more-galleries">
								<div class="inner-text-container-more-galleries">
									<p>
										<?php echo $one_post->post_title; ?>
									</p>
								</div>
								<span><img src="http://annalisafotobb.local/wp-content/uploads/2023/02/31-arrow-right-flat-1.gif" alt=""></span>
							</div>
						</a>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div >
<section>




<?php get_footer(); ?>

