<?php
add_theme_support('title-tag'); // Ajouter la prise en charge du titre automatique par WordPress

/**  Enqueue des styles CSS **/
function enqueue_photoEvent_styles()
{
	wp_enqueue_style('photoEvent-style', get_stylesheet_uri());
	wp_enqueue_style('photoEvent-modale-style', get_template_directory_uri() . '/assets/css/modale.css');
	wp_enqueue_style('photoEvent-single-style', get_template_directory_uri() . '/assets/css/single.css');
	wp_enqueue_style('photoEvent-accueil-style', get_template_directory_uri() . '/assets/css/accueil.css');
	wp_enqueue_style('photoEvent-lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.css');
}

add_action('wp_enqueue_scripts', 'enqueue_photoEvent_styles');

/**  Enqueue des JS **/
function enqueue_photoEvent_scripts()
{
	$reference_acf = get_field('nom_du_champ_acf_pour_la_reference');
	// Passez la valeur du champ ACF à JavaScript en utilisant wp_localize_script

	wp_localize_script('photoEvent-scripts', 'acfData', array(
		'reference' => $reference_acf,
	));
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);

	wp_enqueue_script('photoEvent-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true);
	wp_enqueue_script('photoEvent-ajax', get_template_directory_uri() . '/assets/js/ajax.js', array(), '1.0', true);
	// wp_enqueue_script('script2', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '', true);
	wp_enqueue_script('photoEvent-lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_photoEvent_scripts');


/** Enregistrement des menus de navigation **/
function photoEvent_register_menus()
{
	register_nav_menus(array(
		'header' => __('Principal'),
		'footer' => __('Pied de page'),
	));
}
add_action('init', 'photoEvent_register_menus');


/**Personnalisation du thème**/
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


/**  Bouton de contact dans le header **/
function mon_bouton_dans_header()
{
	echo '<a href="modal-contact" class="mon-bouton">CONTACT</a>';
}
add_action('my_custom_header_hook', 'mon_bouton_dans_header');

/**  Fonction de filtrage des éléments **/
function filtre()
{
	// Effectue une requête personnalisée pour filtrer les éléments en fonction des paramètres POST et affiche les résultats
	$filtre = new WP_Query([
		'post_type' => 'photo',
		'orderby'  => 'date',
		'order' => $_POST['post_ordre'],
		'paged' => $_POST['paged'],
		'posts_per_page' => 12,
		'tax_query' => array(
			$_POST['category'] != "all" ?
				array(
					'taxonomy' => 'categorie',
					'field'    => 'slug',
					'terms'    => $_POST['category'],
				)
				: '',
			$_POST['post_format'] != "all" ?
				array(
					'taxonomy' => 'format',
					'field'    => 'slug',
					'terms'    => $_POST['post_format'],
				)
				: '',
		)
	]);

	if ($filtre->have_posts()) :
		while ($filtre->have_posts()) :
			$filtre->the_post();
?>
			<div class="overlay-image">
				<?php the_content(); ?>
				<div class=hover>
					<a href="#">
						<img class="full_screen" data-category="<?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?>" data-reference="<?php echo get_field('reference', get_the_ID()); ?>" data-image="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="full_screen">
					</a> <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
						<img class="eye" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="eye">
					</a>
					<div class="texte">
						<div class="ref-box"><?php echo get_field('reference', $post->ID); ?></div>
						<div class="cat-box"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
<?php endif;
	wp_reset_postdata();
	exit();
}
add_action('wp_ajax_filtre', 'filtre');
add_action('wp_ajax_nopriv_filtre', 'filtre');

/** Fonction pour afficher les options de catégorie pour le filtrage **/
function filtreCategorie()
{
	if ($terms = get_terms(array(
		'taxonomy' => 'categorie',
		'field'    => 'slug',
		'terms'    => $_POST['category'],
	)))
		foreach ($terms as $term) {
			echo '<option  value="' . $term->slug . '">' . $term->name . '</option>';
		}
}
/** Fonction pour afficher les options de format pour le filtrage **/
function filtreFormat()
{
	if ($terms = get_terms(array(
		'taxonomy' => 'format',
		'field'    => 'slug',
		'terms'    => $_POST['post_format'],
	)))
		foreach ($terms as $term) {
			echo '<option  value="' . $term->slug . '">' . $term->name . '</option>';
		}
}
/** Fonction pour afficher les options de tri pour le filtrage **/
function filtreOrderDirection()
{
	if ($order_options = (array(
		'DESC' => 'Nouveautés',
		'ASC' => 'Les plus anciens',
	)))
		foreach ($order_options as $value => $label) {
			echo "<option " . selected($_POST['tri'], $value) . " value='$value'>$label</option>";
		}
}
?>