<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E_Blog
 */

get_header();
?>

	<div id="primary" class="content-area">
	<div class="row">
	<div id="main" class="archive-main col-lg-9 col-md-8 col-sm-8 col-sm-12">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				<div class="col-md-4">
			   	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			   </div>
	
			<?php 
			// Begin Show Custom Meta Field Value(Output)
			$custom_post_type = get_post_meta($post->ID, 'custom_input', true);
			echo $custom_post_type;	
			// End Show Custom Meta Field Value(Output)
		endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div><!-- #main -->
		<div class="main-sidebar col-lg-3 col-md-4 col-sm-4 col-sm-12">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
