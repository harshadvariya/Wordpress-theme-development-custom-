<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E_Blog
 */

get_header();
?>

	<div id="primary" class="content-area">
		<h1><?php echo get_theme_mod( 'home_text_1', 'This is a defualt value' ); ?></h1>
		<div class="row">
		<div id="main" class="site-main col-lg-9 col-md-8 col-sm-8 col-sm-12">

			<div class="entry-content">
				<?php 
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => '2',
					'paged' => 1,
				);
				$my_posts = new WP_Query( $args );
				if ( $my_posts->have_posts() ) : 
				?>
					<div class="my-posts">
						<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
							<h2><?php the_title() ?></h2>
							<?php the_post_thumbnail(); ?>
							<?php the_excerpt() ?>
						<?php endwhile ?>
					</div>
				<?php endif ?>
				<div class="loadmore">Load More...</div>
			</div>

		</div><!-- #main -->
		<div class="main-sidebar col-lg-3 col-md-4 col-sm-4 col-sm-12">
			<?php get_sidebar(); ?>
		</div>
	</div>
	</div><!-- #primary -->

<script type="text/javascript">
var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
var page = 2;
jQuery(function($) {
	$('body').on('click', '.loadmore', function() {
		var data = {
			'action': 'load_posts_by_ajax',
			'page': page,
			'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
		};

		$.post(ajaxurl, data, function(response) {
			$('.my-posts').append(response);
			page++;
		});
	});
});
</script>

<?php

get_footer();
