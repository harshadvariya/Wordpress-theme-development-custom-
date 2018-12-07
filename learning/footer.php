<?php
/* Theme Footer file */
?>

</div>
</div>
<footer>
	<div class="container">
		<div class="footer-widget">
			<div class="footer-col"><?php dynamic_sidebar('footer1'); ?></div>
			<div class="footer-col"><?php dynamic_sidebar('footer2'); ?></div>
			<div class="footer-col"><?php dynamic_sidebar('footer3'); ?></div>
		</div>
		<div class="footer-menu">
		<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-nav', 'menu_id' => 'footer-menu')); ?>
		</div>
	</div>
</footer>
</body>
</html>