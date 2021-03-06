<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package Merlin
 */
 
?>
	
	</div><!-- #content -->
	
	<?php do_action( 'merlin_before_footer' ); ?>

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		
		<div id="footer-text" class="site-info">
			<?php do_action('merlin_footer_text'); ?>
		</div><!-- .site-info -->
			
		<nav id="footer-links" class="footer-navigation navigation clearfix" role="navigation">
			<?php 
				// Display Footer Navigation
				wp_nav_menu( array(
					'theme_location' => 'footer', 
					'container' => false, 
					'menu_class' => 'footer-navigation-menu', 
					'echo' => true, 
					'fallback_cb' => '',
					'depth' => 1)
				);
			?>
		</nav><!-- #footer-links -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>