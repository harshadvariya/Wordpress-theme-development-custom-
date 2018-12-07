<?php
/*
Single Post For Theme
*/
get_header();
?>

<div class="main-content"> 

	<?php while ( have_posts() ) : the_post(); ?>
	<div class="post-row">
		<h1><?php the_title(); ?></h1>
		<?php the_excerpt(); ?>
	</div>
	<?php endwhile; ?>
	
</div>
<div class="main-sidebar">
	<?php get_sidebar(); ?>
</div>
<?php
	get_footer();
?>