<div id="heroheader">
<?php
// Création d'une requête personnalisée pour récupérer un article aléatoire de type "photo"
$the_query = new WP_Query( array ( 
    'orderby' => 'rand',
     'posts_per_page' => 1 ,
     "post_type" => 'photo' ) );

// Afficher la photo aléatoire trouvé
while ( $the_query->have_posts() ) : $the_query->the_post();
    the_post_thumbnail();
endwhile;

// Réinitialiser les données de l'article pour éviter d'affecter d'autres requêtes
wp_reset_postdata();
?>

<!-- Titre pour cette section -->
<h1>PHOTOGRAPHE EVENT</h1>
</div>
