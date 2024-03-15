document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.admin_form');

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    const region = document.querySelector('select[name="regions"]').value;
    const date = document.getElementById('date').value;
    const name = document.getElementById('name').value;
    const description = document.getElementById('description').value;

    if (!region || !date || !name || !description) {
      alert("Veuillez remplir tous les champs !");
      return;
    }

    if (!validateDate(date)) {
      alert("La date saisie est invalide !");
      return;
    }

    if (!validateRegion(region)) {
      alert("La région saisie est invalide !");
      return;
    }

    if (!validateName(name)) {
      alert("Le nom de l'événement doit avoir entre 3 et 50 caractères !");
      return;
    }

    if (description && !validateDescription(description)) {
      alert("Le commentaire doit avoir entre 5 et 100 caractères !");
      return;
    }

    this.submit();
  });
});

function validateDate(date)
{
  if (!/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(date)) {
    return false;
  }

  const timestamp = Date.parse(date);
  if (isNaN(timestamp)) {
    return false;
  }

  return true;
}

function validateRegion(region)
{
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

  if (!allowedRegions.includes(region)) {
    return false;
  }

  return true;
}

function validateName(name) {
  return name.length >= 3 && name.length <= 50;
}

function validateDescription(description) {
  return description.length >= 5 && description.length <= 100;
}
