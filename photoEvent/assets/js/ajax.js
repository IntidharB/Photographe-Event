// Variable pour suivre la page actuelle
let currentPage = 1;
// Fonction pour charger davantage de publications
function loadMorePosts() {
  // Incrémente la page actuelle à chaque clic sur "Load More"
  currentPage++;
  
  // Effectue une requête AJAX pour obtenir les publications suivantes
  $.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filtre',
      paged: currentPage,
      category:$('#categFiltre').val(),
      post_format: $('#formFiltre').val(),
      post_ordre: $('#triFiltre').val(),
    },
    success: function (res) {
      // Ajoute le contenu au bas de la liste existante
      $('.photos-acc').append(res);
      lightbox();
      
      // Après avoir ajouté de nouvelles publications, réappliquer les filtres
      applyFilters();
    }
  });
}

// Gère le clic sur le bouton "Load More"
$('#load-more').on('click', loadMorePosts);

// Fonction pour charger le contenu en utilisant AJAX avec des filtres
function loadContent(page, category, postFormat, postOrder) {
  // Effectue une requête AJAX pour obtenir le contenu filtré
  $.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filtre',
      paged: page,
      category: category,
      post_format: postFormat,
      post_ordre: postOrder,
    },
    success: function (res) {
      // Mettre à jour le contenu de .photos-acc avec la réponse AJAX
      $('.photos-acc').html(res);
      lightbox();
    }
  });
}
// Fonction pour appliquer les filtres
function applyFilters() {
  // Réinitialise la page actuelle lorsque les filtres changent
  currentPage = 1;
  // Charge le contenu avec les filtres actuels
  loadContent(currentPage, $('#categFiltre').val(), $('#formFiltre').val(), $('#triFiltre').val());
}
// Gère les changements dans les sélecteurs de filtre
$('#categFiltre, #formFiltre, #triFiltre').on('change', applyFilters);
