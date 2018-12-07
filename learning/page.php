<?php
/*
Page File For Displaying Page Content
*/
get_header();
?>

<div class="main-content" id="page-content"> 

	<?php while ( have_posts() ) : the_post(); ?>
	<div class="post-row">
		<h1 style="text-align: center;"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	<?php endwhile; ?>
	
</div>

<?php
	get_footer();
?>