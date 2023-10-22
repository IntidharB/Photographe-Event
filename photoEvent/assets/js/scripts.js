console.log("Le script est bien chargé !");
jQuery(document).ready(function($) {
	 // Ouvrir la modale lorsque le bouton est cliqué
	// Ouvrir la modale lorsque le bouton est cliqué
	$('.mon-bouton').on('click', function(e) {
		e.preventDefault();
		// Fermer le menu burger s'il est ouvert
		if ($('#burger-menu').hasClass('open')) {
		    $('#burger-menu').removeClass('open');
		    $('#responsive-menu').removeClass('show-menu');
		}
		// Afficher la modale
		$('#modal-contact').fadeIn();
	    });
	 // Fermer la modale lorsque l'utilisateur clique en dehors de celle-ci
	 $(document).on('click', function(e) {
		if ($(e.target).is('#modal-contact')) {
		    $('#modal-contact').fadeOut();
		}
	    });
	    
   
    });
   
//modale single page 
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
    
    
    $(document).ready(function() {
	$('.flecheGauche, .flecheDroite').hover(
	  function() {
	    var dynamicImage = $(this).siblings('.dynamic-image').find('img');
	    var newImageSrc = $(this).siblings('.dynamic-image').find('div').html();
	    dynamicImage.fadeOut(300, function() {
	      dynamicImage.attr('src', newImageSrc).fadeIn(300);
	    });
      
	    // Ajouter une classe CSS lors du survol
	    $(this).addClass('hovered');
	  },
	  function() {
	    // Retirer la classe CSS lorsque le survol est terminé
	    $(this).removeClass('hovered');
	  }
	);
      });
      
      