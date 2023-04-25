<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php locate_template( array( 'includes/acf-sections/sections.php' ), true, true ); ?>
<?php the_content();?>

<div class="content-container">
	<div class="content-inner-container">
		<div class="content-wrapper">
			<div class="entry">
				<section class="isotope-container">
					<div class="title-masonry-cont">
						<h2>PORTFOLIO</h2>
					</div>
					<div class="filter">
						<button data-name="*" class="isotope-btn">Alla</button>
						<button data-name=".barn-familj" class="isotope-btn">Barn & familj</button>
						<button data-name=".brollop" class="isotope-btn">Bröllop</button>
						<button data-name=".fineart" class="isotope-btn">Fineart</button>
						<button data-name=".foretag" class="isotope-btn">Företag</button>
						<button data-name=".portratt" class="isotope-btn">Porträtt</button>
					</div>

					<?php 
						$args = array(
							'numberposts' => 9,
							'post_type' => 'post',
							'orderby'=> 'date', 
						);
						$postz = get_posts($args); 
					?>

					<div class="grid">
						<?php foreach($postz as $item):
							$postid = $item->ID;
							$size = 'medium';
						?>

						<div class=" <?php $prodcat = get_the_category($postid);
							foreach($prodcat as $asd):
								echo $asd->slug; 
							endforeach; ?> 
						grid-item">

							<a href="<?php echo $item->guid; ?>">
								<?php echo get_the_post_thumbnail( $item->ID, $size ); ?>
								<div class="text-container">
									<p>
										<?php echo $item->post_title; ?>
									</p>
									<p>
										<?php foreach($prodcat as $asd):
											echo $asd->cat_name;
										endforeach;?>
									</p>
								</div>
							</a>
							
						</div>
					<?php endforeach; ?>
				</section>
			</div>
		</div>
	</div>
</div>


<section class="about-me-cont">
	<div class="apply-width">
		
		<!-- <div class="headers-mid-section">
			<h2>Kort om mig</h2>
			<h2>Varför välja mig?</h2>
		</div> -->
		<div class="column-who-am-i-cont">
			<div class="column-who-am-i-img">
			<!-- <h2>Kort om mig</h2> -->
				<div class="lisa-img-cont"></div>
			</div>
			<div class="column-who-am-i-text">
				<p>
					<span>L</span>
					orem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas deleniti, inventore id blanditiis reprehenderit eaque. Voluptas deleniti, inventore id blanditiis reprehenderit eaque.
				</p>
			</div>
			<div class="column-last-text">
			<!-- <h2>Varför välja mig?</h2> -->
				<!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas deleniti, inventore id blanditiis reprehenderit eaque</p> -->
				<ul>
					<li>Lorem, ipsum dolor sit amet consectetur.</li>
					<li>Sit amet consectetur adipisicing elit.</li>
					<li>Voluptas deleniti, oluptas deleniti, inventore.</li>
					<li>Eius, velit aut impedit laborum inventore id blanditiis.</li>
				</ul>
			</div>
			<div class="very-last">
				<div>
					<img src="http://annalisafotobb.local/wp-content/uploads/2023/02/41-quotation-mark-second-flat-5.gif" alt="">
				</div>
				<p>Strålande fotograf! Fick mig ett par goa asgarv tillsammans med Lisa innan jag gick.</p>
			</div>
		</div>
	</div>
</section>

<article <?php post_class('wrapper'); ?> id="post-<?php the_ID(); ?>">
	<section class="pages-container-cat">
		<div class="pages-title-cont-cat">
			<h2>Vilket tillfälle behöver ni en fotograf till?</h2>
		</div>
		<div class="pages-grid-cont">
			<?php 
				$cats = get_categories(); 
				foreach( $cats as $cat ){ 
					$cat_id = $cat->term_id;
					$url = get_term_link($cat_id);
					$taxonomy = $cat->taxonomy;
					$image = get_field('visningsbild_startsida', $taxonomy . '_' . $cat_id);
					echo '<li>
						<div class="flex-container">
							<div class="img-cont-cat" style="background-image:url(' . $image . ')">
								<div class="menu-title-cont-cat">
									<h3>' . $cat->name . '</h3>
								<div class="border-cont-cat"></div>
							</div>
						</div>
						<div class="description-cont-cat">
							' . category_description($cat_id) . '
							<div><a href="' . $url . '">' . 'Läs mer och se priser ></a></div>
						</div>
					</li>';
				};
			?>
		</div>
	</section>
</article>

<section class="content-container" id="content-container-background-c">
	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">
				<div class="entry">
			
					<div class="text-img-sec">
						<img src="http://annalisafotobb.local/wp-content/uploads/2022/11/annalisa_low-1.png" alt="">
						<h3>Över 20 år som professionell fotograf.</h3>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis consectetur quidem minima quas alias unde architecto quasi dolores maiores accusantium?</p>
					</div>
					<div class="text-img-sec-two">
						<div class="text-img-sec-two-inner">
							<h3>Välkommen till min studio</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, voluptas!</p>
							<a href="">Hitta hit</a>
						</div>
						<div class="text-img-sec-two-inner">
							<h3>Vill du att vi ska komma till dig?</h3>
							<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum rem accusamus voluptatum.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>