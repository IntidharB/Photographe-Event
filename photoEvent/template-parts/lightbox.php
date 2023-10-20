
<!-- lightbox.php -->
<div id="custom-lightbox">
    <span class="close-lightbox">&times;</span>
    <div class="lightbox-content">
        <img src="" alt="lightbox-image" id="lightbox-image">

        <div class="lightboxText">
            <div class="lightbox-ref"><?php echo get_field('reference', get_the_ID()); ?></div>
            <div class="lightbox-cat"><?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?></div>

        </div>
    </div>
    <div class="navigation">
        <span class="prev_span">
            <img class="prev" src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche_white.svg" alt="fleche_gauche"> 
            Précédente
        </span>
        <span class="next_span">
            Suivante
            <img class="next" src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche_white.svg" alt="fleche_droite">
        </span>
    </div>
</div>