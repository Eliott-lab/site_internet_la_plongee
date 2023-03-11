function detecterDirectionScrollbar() {
  // Stocker la position actuelle de la scrollbar
  let positionPrecedente = window.pageYOffset;

  // Ajouter un écouteur d'événement pour détecter le défilement de la page
  window.onscroll = function() {
    // Obtenir la nouvelle position de la scrollbar
    let positionActuelle = window.pageYOffset;

    // Comparer la position actuelle avec la position précédente pour déterminer la direction de défilement
    if (positionPrecedente > positionActuelle) {
      // Si la direction est vers le haut, ajouter la classe "vers_le_haut" et supprimer la classe "vers_le_bas"
      document.body.classList.remove("vers_le_bas");
      document.body.classList.add("vers_le_haut");
    } else {
      // Si la direction est vers le bas, ajouter la classe "vers_le_bas" et supprimer la classe "vers_le_haut"
      document.body.classList.remove("vers_le_haut");
      document.body.classList.add("vers_le_bas");
    }

    // Mettre à jour la position précédente avec la nouvelle position actuelle
    positionPrecedente = positionActuelle;
  }
}






