<?php
/*
Main Index File For Theme
*/
get_header();
?>

<div class="main-content"> 

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post-row">
		<h1><?php the_title(); ?></h1>
		<?php the_excerpt(); ?>
		<p><a href="<?php the_permalink(); ?>">Read More Post</a></p>
	</div>
	<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	
</div>
<div class="main-sidebar">
	<?php get_sidebar(); ?>
</div>
<?php
	get_footer();
?>