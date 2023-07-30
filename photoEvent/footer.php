<?php wp_footer() ?>	
<nav>
		<!--afficher le menu footer-->
			<?php wp_nav_menu(array(
				'theme_location' => 'footer',
				'menu_class' => 'footer-menu'

				
			)); ?>
		</nav>
</body>
</html>