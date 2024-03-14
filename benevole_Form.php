<?php
require_once './components/header.php';
displayHeader();

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'benevole') {
  header('Location: benevole_Login.php');
  exit();
}


$nameError = $firstNameError = $ageError = $sexeError = $phoneError = $mailError = $regionError = $dispoError = $dispoHoraireError = $preferencesError = '';
$name = $firstName = $age = $sexe =  $phone = $mail = $region = $dispo = $dispoHoraire = $preferences = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $firstName = $_POST["firstname"];
  $age = $_POST["age"];
  $sexe = $_POST["sexe"];
  $phone = $_POST["phone"];
  $mail = $_POST["mail"];
  $region = $_POST["region"];
  $dispo = $_POST["dispo"];
  $dispoHoraire = $_POST["dispoHoraire"];
  $preferences = $_POST["preferences"];


  $db = new Db('./csv/users.csv');
  $file = $db->openCsv();
  $données = [$name, $firstName, $age, $sexe, $phone, $mail, $region, $_dispo , $dispoHoraire , $preferences];

  $db->writeIntoCsv($file, $données);
  $db->closeCsv($file);



  header("Location: benevole_Accueil.php");

  exit();
};

?>
<!-- Formulaire 1 -->
<form method="post" class="one" action="" onsubmit="return validateform()">
  <div id="form1">

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
        <input min="18" max="45" type="number" id="age" name="age" required />
      </li>

      <li>
        <label for="sexe">Sélectionnez le sexe</label>
        <select name="sexe" id="sexe" required>
          <option value="" disabled selected>Genre</option>
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
        <input type="email" id="mail" name="mail" required />
      </li>
    </ul>

    <button type="button" onclick="validateform1(event)">Suivant</button>
  </div>
  <!-- Formulaire 2 -->


  <div id="form2" class="hidden">
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
        <label for="dispo">Sélectionnez vos disponibilités :</label><br>

        <input type="checkbox" name="dispo[]" value="semaine">En semaine<br>
        <input type="checkbox" name="dispo[]" value="weekend">Le week-end<br>

      </li>
      <li>
        <label for="preference">Sélectionner vos préférences d'horaires</label><br>
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









    <button type="button" onclick="previousform()">Précédent</button>
    <button type="button" onclick="validateform2(event)">Suivant</button>



  </div>

  <!-- Fin formulaire 3 -->
  <div id="form3" class="hidden">
    <ul>
      <li>
        <label for="expression">Exprimez vous!</label><br>

        <textarea id="message" name="message"></textarea>
      </li>
    </ul>
    <button type="button" onclick="previousform()" id="third">Précédent</button>
  </div>
</form>

<?php
require_once './components/footer.php';
displayFooter();
?>


<script src="./script/benevole_Form.js"></script>