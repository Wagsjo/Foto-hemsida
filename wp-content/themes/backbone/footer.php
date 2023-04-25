	</div>

	<footer class="footer" id="footer">
		<div class="footer-container">
			<div class="footer-inner">
				<h4>OM MIG</h4>
				<p>
					Jag har ägt en kamera och jag älskar att fotografera.
				</p>
				<p>
					Jag äger även två hundar, en stor och en liten och de heter Måns och Sally
				</p>
				<p>
					Vill du se en lista med nöjda kunder kan du göra det här
				</p>
			</div>
			<div class="footer-inner">
				<h4>KATEGORIER</h4>
				<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			<div class="footer-inner">
				<h4>MAILA MIG</h4>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]');?> 
			</div>

		</div>
		<div class="under-footer">
			<p>2022 - Annalisafoto - Bilder skyddade av upphosvrättslagen</p>
			<a href="https://www.instagram.com/annalisafoto/">
				<i class="icofont-instagram"></i>
				<p>@annalisafoto</p>
			</a>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
