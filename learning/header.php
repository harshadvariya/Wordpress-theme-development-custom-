<?php
/* Theme Header file */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name') ?> - <?php bloginfo('description') ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
</head>
<body>
<header>
	<div class="container">
		<div class="logo"><a href="<?php bloginfo('url') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="Logo"></a></div>
		<div class="menu clearfix">
			<?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu', 'menu_id' => 'main-menu')); ?>
		</div>
	</div>
</header>
<div class="site-content clearfix">
	<div class="container">