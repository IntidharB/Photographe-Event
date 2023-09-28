<?php wp_footer() ?>
<footer>
<nav class="menu">

	<!--afficher le menu footer-->
	<?php wp_nav_menu(array(
		'theme_location' => 'footer',
		'menu_class' => 'footer-menu'
	)); ?>
	<p>TOUS DROITS RÉSERVÉS</p>
</nav>

<?php get_template_part('template-parts/modal-contact'); ?>


</footer>
</body> 

</html>