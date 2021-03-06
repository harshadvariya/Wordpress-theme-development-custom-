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
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

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
