<?php
require_once './components/header.php';
displayHeader();
?>
<form action="" class="admin_form"> 
    <label for="regions">Régions</label>
    <select name="regions">
        <option value="" selected disabled>Choissiez une région</option>
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
    <label for="date">date</label>
    <input type="date" name="date" id="date">
    <label for="text">name</label>
    <input type="text" name="name" id="name">
    <label for="description">description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit" action="">
</form>
<script src="./script/adm"></script>
<?php
require_once './components/footer.php';
displayFooter();
?>

<?php
require_once './classes/Db.php';

// Traitement des données du formulaire d'administration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données
    $region = $_POST['regions'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Validation des données
    if (empty($region) || empty($date) || empty($name) || empty($description)) {
        // Redirection avec un message d'erreur si des champs sont manquants
        header('Location: form_admin.php?error=missing_fields');
        exit;
    }

    // Initialisation de la classe Db avec le chemin vers le fichier CSV
    $db = new Db('events.csv');

    // Ouverture du fichier CSV en mode écriture
    $file = $db->openCsv();

    // Écriture des données dans le fichier CSV
    $db->writeIntoCsv($file, [$region, $date, $name, $description]);

    // Fermeture du fichier CSV
    $db->closeCsv($file);

    // Exemple de redirection après traitement
    header('Location: confirmation.php');
    exit;
}
?>
