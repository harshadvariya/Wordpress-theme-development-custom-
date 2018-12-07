<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package E_Blog
 */
global $options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
		  jQuery('#slider').slippry();
		});
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eblog' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-top">
			<div class="container clearfix">
				<div class="header-menu-container col-md-6 col-sm-6 float-left">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'header top',
							'menu_id'        => 'header-top',
						) );
						?>
				</div>
				<!-- <div class="header-social col-md-6 col-sm-6 float-right">
					<a href=""><i class="fa fa-facebook-official"></i></a>
					<a href=""><i class="fa fa-twitter-square"></i></a>
					<a href=""><i class="fa fa-google-plus-square"></i></a>
					<a href=""><i class="fa fa-pinterest-square"></i></a>
					<a href=""><i class="fa fa-tumblr-square"></i></a>
				</div> -->
				<?php
					if($options['social-icons'] == TRUE) { ?>
				<div class="header-social col-md-6 col-sm-6 float-right">
					<a href=""><i class="fa fa-facebook-official"></i></a>
					<a href=""><i class="fa fa-twitter-square"></i></a>
					<a href=""><i class="fa fa-google-plus-square"></i></a>
					<a href=""><i class="fa fa-pinterest-square"></i></a>
					<a href=""><i class="fa fa-tumblr-square"></i></a>
				</div>
				<?php } ?>
			</div>
		</div><!-- .header-top -->

		<div class="site-branding">
			<div class="container">
				<div class="logo">
					<img src="<?php echo $options['logo']['url']; ?>">
				</div>
			</div>	
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<i class="fa fa-bars"></i>
				</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
