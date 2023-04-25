<?php
/*
 * Footer components
 */
?>

<footer class="footer">

	<?php include_once( 'menus/footer.php' ); ?>



	<div class="content-container">
		<div class="content-inner-container">
			<div class="content-wrapper">
				<?php	if( $cols = get_field('footer_cols', 'option') ) { ?>
					<div class="footer-cols">
					    <?php foreach( $cols as $col ) { ?>
							<div class="footer-col">
								<?php echo $col['footer_col_content']; ?>
					      </div>
					    <?php } ?>
					 </div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php if( $bottom_text = get_field('footer_bottom_text', 'option') ) { ?>
		<div class="footer-bottom-container">
			<div class="content-container">
				<div class="content-inner-container">
					<div class="content-wrapper">
						<div class="footer-bottom">
							<p><?php echo $bottom_text['copyright'] ?></p>

							<?php if( $bottom_text['privacypolicy'] ){ ?>
								<a href="<?php echo $bottom_text['privacypolicy'] ?>">
									<?php _e('Privacy policy', 'backbone'); ?>
								</a>
							<?php } ?>

							<?php if( $bottom_text['cookiepolicy'] ){ ?>
								<a href="<?php echo $bottom_text['cookiepolicy'] ?>">
									<?php _e('Cookie policy', 'backbone'); ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

</footer>
