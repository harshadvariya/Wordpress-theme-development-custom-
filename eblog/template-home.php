<?php
/**
 * The template for displaying all pages
 * Template Name: Homepage Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E_Blog
 */

get_header();
global $options;
?>

	<div id="primary" class="content-area">
		<div class="row">
		<div id="main" class="site-main col-lg-9 col-md-8 col-sm-8 col-sm-12">
		<?php echo $options['text-example'] ?>
		<div class="home-page-slider">
			<ul id="slider">
				<?php
				
				$slider_args = array(
						'post_type' =>  'slider',
						'posts_per_page' => 5
				);

		    	$slider = new WP_Query($slider_args);
				if ( $slider->have_posts() ) :

					/* Start The Loop */
		while ($slider->have_posts()): $slider->the_post(); 
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'slider-image',true);
			?>
			<li>
			    <a href="#slide1">
			    	<img src="<?php echo $thumb_url[0] ?>" alt="<h3><?php the_title(); ?></h3>">
			    </a>
			</li>

				<?php	endwhile;
					wp_reset_postdata();
				endif;
				?>
			</ul>
		</div>

		<?php
			while (have_posts()):
			    the_post();

			    get_template_part('template-parts/content', 'home');

			endwhile; // End of the loop.
			?>
			<div class="latest-posts">
				<!-- <div class="post-block-title"><h2>Latest Posts</h2></div> -->
				<div class="post-block-title"><h2>About Us</h2></div>
				<div class="post-block-body">
			<?php
				// $args = array('cat' =>  '4',
				// 			  'posts_per_page' => 2
				// used for post ); 
			$args = array(
						// 'cat' =>  '4',
						// 'posts_per_page' => 2
						'page_id' => 2
				);
				// $latest_post = new WP_Query($args);
			$about_us = new WP_Query($args);
				if ($about_us->have_posts()):
				    while ($about_us->have_posts()): $about_us->the_post();?>
				    <div class="row mb-10">
				    	<!-- <div class="latest-posts-thumb col-md-4">
				    		<?php the_post_thumbnail(); ?>
				    	</div> -->
						<div class="latest-post-title">
							<?php the_excerpt(); ?>
						</div>
					</div>
									<?php	endwhile;
				else:
				    get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>
		</div>
		</div><!-- #main -->

		<div class="main-sidebar col-lg-3 col-md-4 col-sm-4 col-sm-12">
			<?php get_sidebar();?>
		</div>

		</div>
	</div><!-- #primary -->
<?php
get_footer();