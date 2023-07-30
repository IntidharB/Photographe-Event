<?php 
add_theme_support('title-tag') ;// Ajouter la prise en charge du titre automatique par WordPress

function photoEvent_register_menus()
{
	register_nav_menus(array(
		'header' => __('Principal'),
		'footer' => __('Pied de page'),
	));
}
add_action('init', 'photoEvent_register_menus');

// Personnalisation du thème
function photoEvent_customize_register($wp_customize)
{
	// Ajout d'une section pour le logo personnalisé
	$wp_customize->add_section('photoEvent_logo_section', array(
		'title'      => __('Logo personnalisé', 'photoEvent'),
		'priority'   => 30,
	));

	// Ajout de la fonctionnalité de logo personnalisé
	$wp_customize->add_setting('photoEvent_logo');

	// Ajout du contrôle pour téléverser le logo personnalisé
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'photoEvent_logo', array(
		'label'    => __('Téléverser votre logo', 'photoEvent'),
		'section'  => 'photoEvent_logo_section',
		'settings' => 'photoEvent_logo',
	)));
}
add_action('customize_register', 'photoEvent_customize_register');