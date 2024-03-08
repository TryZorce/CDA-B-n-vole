function validateForm() {
    var name = document.getElementById('name').value;
    
    
    if (name.length < 4) {
      alert('Votre nom doit contenir au moins 4 caractères');
      return false; 
    }

    

    return true; // Autorise la soumission du formulaire si toutes les vérifications sont réussies
  }

const check = document.getElementById('name').value;

if (check.length < 4) {
    alert('Votre nom doit contenir au moins 4 caractères');
} else if (check.length > 30) {
    alert('Votre nom ne doit pas dépasser 30 caractères');
}

