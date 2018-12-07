<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package E_Blog
 */
global $options;
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets">
				<div class="row">
					<div class="widget-col col-md-4">
						<?php dynamic_sidebar('footer-1'); ?>
					</div>
					<div class="widget-col col-md-4">
						<?php dynamic_sidebar('footer-2'); ?>
					</div>
					<div class="widget-col col-md-4">
						<?php dynamic_sidebar('footer-3'); ?>
					</div>
				</div>
			</div>
		<div class="site-info">
			<?php echo $options['copyright-text'] ?>
		</div><!-- .site-info -->
	</div><!-- .end-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
