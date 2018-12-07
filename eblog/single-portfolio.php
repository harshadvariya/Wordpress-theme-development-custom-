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
		while ( have_posts() ) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>
			<div class="portfolio-thumb">
				<?php the_post_thumbnail('full');  ?>
			</div> 
			<div class="portfolio-content">
				<?php the_content(); ?>
			</div>
		<?php
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
