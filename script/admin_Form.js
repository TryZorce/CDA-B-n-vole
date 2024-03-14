document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.admin_form');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault(); 
  
      const region = document.querySelector('select[name="regions"]').value;
      const date = document.getElementById('date').value;
      const name = document.getElementById('name').value;
      const description = document.getElementById('description').value;
  
      // Vérification de la présence de toutes les données
      if (!region || !date || !name || !description) {
        alert("Veuillez remplir tous les champs !");
        return;
      }
  
      // Vérification de la validité de la date
      if (!validateDate(date)) {
        alert("La date saisie est invalide !");
        return;
      }
  
      // Vérification de la validité de la région
      if (!validateRegion(region)) {
        alert("La région saisie est invalide !");
        return;
      }
  
      // Soumission du formulaire
      this.submit();
    });
  });
  
  // Fonction de validation de la date
  function validateDate(date)
  {
    // Vérification du format de la date
    if (!/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(date)) {
      return false;
    }
  
    // Vérification de la validité de la date
    const timestamp = Date.parse(date);
    if (isNaN(timestamp)) {
      return false;
    }
  
    return true;
  }
  
  // Fonction de validation de la région
  function validateRegion(region)
  {
    // Liste des régions autorisées
    const allowedRegions = [
      "Auvergne-Rhône-Alpes",
      "Bourgogne-Franche-Comté",
      "Bretagne",
      "Centre-Val de Loire",
      "Corse",
      "Grand Est",
      "Hauts-de-France",
      "Île-de-France",
      "Normandie",
      "Nouvelle-Aquitaine",
      "Occitanie",
      "Pays de la Loire",
      "Provence-Alpes-Côte d'Azur"
    ];
  
    // Vérification de la présence de la région dans la liste autorisée
    if (!allowedRegions.includes(region)) {
      return false;
    }
  
    return true;
  }
  