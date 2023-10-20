// Déclarez images en dehors de $(document).ready
let images;

$(document).ready(function () {
    let currentIndex = 0;
    const lightbox = $('#custom-lightbox');
    const lightboxImage = $('#lightbox-image');
    const closeLightboxButton = $('.close-lightbox');
    const lightboxTextDiv = $('.lightboxText');

    // Assurez-vous que images est initialisé avec les éléments .full_screen
    images = $('.full_screen');

    // Affiche la lightbox
    function openLightbox(index) {
        currentIndex = index;
        updateLightboxContent();
        updatelightboxTextContent();
        lightbox.show();
    }

    // Ferme la lightbox
    function closeLightbox() {
        lightbox.hide();
    }

    // Met à jour le contenu de la lightbox avec l'image actuelle
    function updateLightboxContent() {
        const currentImage = images.eq(currentIndex);
        const imageUrl = currentImage.attr('data-image');
        lightboxImage.attr('src', imageUrl);
    }

    // Met à jour le contenu de la div avec la catégorie et la référence
    function updatelightboxTextContent() {
        const currentImage = images.eq(currentIndex);
        const category = currentImage.attr('data-category');
        const reference = currentImage.attr('data-reference');

        console.log('Category:', category);
        console.log('Reference:', reference);

        const categoryText = category ? `<p> ${category}</p>` : '';
        const referenceText = reference ? `<p> ${reference}</p>` : '';

        lightboxTextDiv.html(categoryText + referenceText);
    }

    // Change l'image dans la lightbox en fonction de la direction (prev ou next)
    function changeImage(direction) {
        currentIndex = (currentIndex + direction + images.length) % images.length;
        updateLightboxContent();
        updatelightboxTextContent();
    }

    // Événements - utilise la délégation d'événements
    $(document).on('click', '.full_screen', function () {
        openLightbox(images.index(this));
    });

    closeLightboxButton.on('click', closeLightbox);

    // Gérer l'événement du bouton "précédent"
    $('.prev').on('click', function () {
        changeImage(-1);
    });

    // Gérer l'événement du bouton "suivant"
    $('.next').on('click', function () {
        changeImage(1);
    });
});/*lightbox*/
