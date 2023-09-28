<?php

/**
 * Template pour afficher les articles individuels du type de contenu personnalisé "photo_gallery".
 *
 * @package WordPress
 * @subpackage photoEvent
 * @since 1.0
 */
?>

<?php get_header(); ?>
<main class="main_single">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="photo">
				<div class="info-photo">
					
					<h1 class="photo-title"><?php the_title(); ?></h1>
					<p>Référence : <span id="ref-photo"> <?php echo get_field('reference'); ?></span></p>
					<p>Categorie : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
					<p>Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
					<p>Type : <?php echo get_field('type'); ?></p>
					<p>Année :<?php the_date(' Y'); ?></p>
					
				</div>
				<div class="photo-content">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="partie_2">

				<p>Cette photo vous intéresse ?
				<input type="button" value="Contact" id="modaleContactSingle">
				
				</p>

				<div class="card">
					<div class="carr">
						<?php the_post_thumbnail(); ?>
						<div class="carrousel">
							<?php
							// Obtenir le post précédent
							$prevPost = get_previous_post();
							$prevLink = get_permalink($prevPost);
							?>
							<!-- Afficher une flèche vers la gauche avec un lien vers le post précédent -->
							<a href="<?php echo $prevLink; ?>">
								<img class="arrow_left" src="<?php echo get_template_directory_uri(); ?>/assets/images/Line6.png" alt="fleche_gauche">
							</a>

							<?php
							// Obtenir le post suivant
							$nextPost = get_next_post();
							$nextLink = get_permalink($nextPost);
							?>
							<!-- Afficher une flèche vers la droite avec un lien vers le post suivant -->
							<a href="<?php echo $nextLink; ?>">
								<img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/assets/images/Line7.png" alt="fleche_droite">
							</a>
						</div>
					</div>

				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="partie_3">
  		<p>VOUS AIMEREZ AUSSI</p>
				<div  id="photosapp">
				<?php get_template_part( 'template-parts/photo-block', get_post_format() ); ?>
				</div>
				<a href="<?php echo home_url()?>"><button id="lienAcc">Toutes les photos </button></a>
	</div>

</main>

<?php get_footer(); ?>

