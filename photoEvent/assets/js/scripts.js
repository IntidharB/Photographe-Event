console.log("Le script est bien chargé !");
jQuery(document).ready(function($) {
	// Ouvrir la modale lorsque le bouton est cliqué
	$('.mon-bouton').on('click', function(e) {
	    e.preventDefault();
	    $('#modal-contact').fadeIn();
	});
    
	// Fermer la modale lorsque l'icône de fermeture est cliquée
	$('.close-modal').on('click', function() {
	    $('#modal-contact').fadeOut();
	});

	 // Fermer la modale lorsque l'utilisateur clique en dehors de celle-ci
	 $(document).on('click', function(e) {
		if ($(e.target).is('#modal-contact')) {
		    $('#modal-contact').fadeOut();
		}
	    });
	
    });
   

    jQuery(document).ready(function($) {
	// Ouvrir la modale lorsque le bouton sur la page individuelle est cliqué
	$('#modaleContactSingle').on('click', function(e) {
	    e.preventDefault();
    
	    // Récupérer la référence de la photo associée en utilisant this
	    var referencePhoto = $('#ref-photo').text();
	//     console.log("Reference de la photo : " + referencePhoto);

	    // Insérer la référence de la photo dans le champ de formulaire Contact Form 7
	    $('[name="RFPHOTO"]').val(referencePhoto);

    
	    // Afficher la modale
	    $('#modal-contact').fadeIn();
	});
    });




    jQuery(document).ready(function($) {
	const arrowLeft = $(".arrow_left");
	const arrowRight = $(".arrow_right");
	const currentPhoto = $("#currentPhoto");
    
	arrowLeft.on("mouseenter", function() {
	    const prevLink = "<?php echo esc_url($prevLink); ?>";
	    if (prevLink) {
		currentPhoto.attr("src", "<?php echo esc_url(get_the_post_thumbnail_url($prevPost)); ?>");
	    }
	});
    
	arrowRight.on("mouseenter", function() {
	    const nextLink = "<?php echo esc_url($nextLink); ?>";
	    if (nextLink) {
		currentPhoto.attr("src", "<?php echo esc_url(get_the_post_thumbnail_url($nextPost)); ?>");
	    }
	});
    });
     
    
    



    
    
     
 
    

    
    
