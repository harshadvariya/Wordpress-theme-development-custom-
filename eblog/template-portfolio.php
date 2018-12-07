<?php
/**
 * The template for displaying all pages
 * Template Name: Portfolio Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E_Blog
 */

get_header();
?>
	<div id="primary" class="content-area">
		<div class="row">
		<div id="main" class="site-main col-lg-9 col-md-8 col-sm-8 col-sm-12">
		<?php
		$portfolio = new WP_Query(array(
			'post-type' => 'portfolio'
		));
		if($portfolio->have_posts()) :
			while ($portfolio->have_posts()): $portfolio->the_post(); ?>
			  
			   <div class="col-md-4">
			   		<a href="<?php the_permalink(); ?>">
			   			<?php the_post_thumbnail(); ?>
			   		</a>
			   </div>
		<?php endwhile; // End of the loop.
		else :
				get_template_part('template-parts/content', 'home');
			endif;
			?>
		</div><!-- #main -->
		<div class="main-sidebar col-lg-3 col-md-4 col-sm-4 col-sm-12">
			<?php get_sidebar();?>
		</div>

		</div>
	</div><!-- #primary -->
<?php
get_footer();