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


    //menu burger
    document.addEventListener('DOMContentLoaded', function () {
	var burgerMenu = document.getElementById('burger-menu');
	var responsiveMenu = document.getElementById('responsive-menu');
    
	burgerMenu.addEventListener('click', function () {
	    burgerMenu.classList.toggle('open');
	    responsiveMenu.classList.toggle('show-menu');
	});
    });
    
    
    
      