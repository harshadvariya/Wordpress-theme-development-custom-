<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package E_Blog
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="row">
		<div id="main" class="post-main col-lg-9 col-md-8 col-sm-8 col-sm-12">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- #main -->
		<div class="main-sidebar col-lg-3 col-md-4 col-sm-4 col-sm-12">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
