<?php
require_once './components/header.php';
displayHeader();
?>

<!-- Formulaire 1 -->
<form action="./script/benevoleForm.js" method="post" class="one" onsubmit="return validateForm()">
  <ul>
    <li>
      <label for="name">Nom</label>
      <input type="text" id="name" name="name" required />
    </li>
    <li>
      <label for="firstName">Prénom</label>
      <input type="text" id="firstName" name="firstName" required />
    </li>
    <li><label for="age">Age</label>
      <input type="number" id="age" name="age" required />
    </li>

    <li>
      <label for="sexe">Sélectionnez le sexe</label>
      <select name="sexe" id="sexe" required>
        <option value="genre" disabled selected>Genre</option>
        <option value="homme" id="man">Homme</option>
        <option value="femme" id="woman">Femme</option>
        <option value="secret" id="secretGender">Secret</option>

      </select>
    </li>
    <li>
      <label for="phone">Numéro de téléphone</label>
      <input type="tel" id="phone" name="phone" required />
    </li>
    <li>
      <label for="mail">Adresse mail</label>
      <input type="mail" id="mail" name="mail" required />
    </li>
  </ul>

  <button>Suivant</button>
  <!-- Formulaire 2 -->



  <ul>
    <li>
      <label for="region">Selectionner une région</label>
      <select name="region" id="region" required>
        <option value="" disabled selected>Sélectionnez une région</option>
        <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
        <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
        <option value="Bretagne">Bretagne</option>
        <option value="Centre-Val de Loire">Centre-Val de Loire</option>
        <option value="Corse">Corse</option>
        <option value="Grand Est">Grand Est</option>
        <option value="Hauts-de-France">Hauts-de-France</option>
        <option value="Île-de-France">Île-de-France</option>
        <option value="Normandie">Normandie</option>
        <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
        <option value="Occitanie">Occitanie</option>
        <option value="Pays de la Loire">Pays de la Loire</option>
        <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
      </select>


    </li>

    

    <li>
      <label for="dispo" >Sélectionnez vos disponibilités :</label><br>

      <input type="checkbox" name="dispo[]" value="semaine">En semaine<br>
      <input type="checkbox" name="dispo[]" value="weekend">Le week-end<br>

    </li>
    <li>
      <label for="preference" >Sélectionner vos préférences d'horaires</label><br>
      <input type="checkbox" name="dispo-horaire[]" value="matin">Matin<br>
      <input type="checkbox" name="dispo-horaire[]" value="apres-midi">Après-midi<br>
      <input type="checkbox" name="dispo-horaire[]" value="soir">Soir<br>
      <input type="checkbox" name="dispo-horaire[]" value="nuit">Nuit<br>
    </li>
    <li>
      <label for="preferences">Sélectionner vos préférences de postes</label><br>
      <input type="checkbox">Sécurité<br>
      <input type="checkbox">Bar<br>
      <input type="checkbox">Techine<br>
      <input type="checkbox">Animation<br>
    </li>
  </ul>









  <button>Suivant</button>

  <ul>
    <li>
      <label for="expression">Exprimez vous!</label><br>

      <textarea id="message" name="message"></textarea>
    </li>
  </ul>


  <!-- Fin formulaire 3 -->
  <input type="submit" value=Soumettre>
</form>




<script src="./script/benevole_Form.js"></script>
<script>
function validateForm() {
  var checkboxes = document.getElementsByName("dispo-horaire[]");
  var checked = false;
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checked = true;
      break;
    }
  }
  if (!checked) {
    alert("Please select at least one option!");
    return false;
  }
  var checkboxes2 = document.getElementsByName("dispo[]");
  var checked2 = false;
  for (var i = 0; i < checkboxes2.length; i++) {
    if (checkboxes2[i].checked2) {
      checked2 = true;
      break;
    }
  }
  if (!checked2) {
    alert("Please select at least one option!");
    return false;
  }

}
</script>

<?php
require_once './components/footer.php';
displayFooter();
?>