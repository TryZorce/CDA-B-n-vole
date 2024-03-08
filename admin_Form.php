<?php
require_once './classes/Db.php';

$regionError = $dateError = $nameError = $descriptionError = '';
$region = $date = $name = $description = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $region = $_POST["regions"];
    $date = $_POST["date"];
    $name = $_POST["name"];
    $description = $_POST["description"];

    // Validation des données ici

    $db = new Db('./csv/events.csv');
    $file = $db->openCsv();
    $data = [$region, $date, $name, $description];
    $db->writeIntoCsv($file, $data);
    $db->closeCsv($file);

    // Rediriger l'utilisateur vers admin_Accueil.php
    header("Location: admin_Accueil.php");
    exit();
}

// Fonction de validation de la date
function validateDate($date)
{
    // Vérification du format de la date
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
        return false;
    }

    // Vérification de la validité de la date
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return false;
    }

    return true;
}

// Fonction de validation de la région
function validateRegion($region)
{
    // Liste des régions autorisées
    $allowedRegions = [
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
    if (!in_array($region, $allowedRegions)) {
        return false;
    }

    return true;
}

require_once './components/header.php';
displayHeader();
?>

<form action="admin_Form.php" method="POST" class="admin_form">
    <label for="regions">Régions</label>
    <select name="regions">
        <option value="" selected disabled>Choissiez une région</option>
        <option value="Auvergne-Rhône-Alpes" <?php if ($region === 'Auvergne-Rhône-Alpes'): ?>selected<?php endif; ?>>Auvergne-Rhône-Alpes</option>
        <option value="Bourgogne-Franche-Comté" <?php if ($region === 'Bourgogne-Franche-Comté'): ?>selected<?php endif; ?>>Bourgogne-Franche-Comté</option>
        <option value="Bretagne" <?php if ($region === 'Bretagne'): ?>selected<?php endif; ?>>Bretagne</option>
        <option value="Centre-Val de Loire" <?php if ($region === 'Centre-Val de Loire'): ?>selected<?php endif; ?>>Centre-Val de Loire</option>
        <option value="Corse" <?php if ($region === 'Corse'): ?>selected<?php endif; ?>>Corse</option>
        <option value="Grand Est" <?php if ($region === 'Grand Est'): ?>selected<?php endif; ?>>Grand Est</option>
        <option value="Hauts-de-France" <?php if ($region === 'Hauts-de-France'): ?>selected<?php endif; ?>>Hauts-de-France</option>
        <option value="Île-de-France" <?php if ($region === 'Île-de-France'): ?>selected<?php endif; ?>>Île-de-France</option>
        <option value="Normandie" <?php if ($region === 'Normandie'): ?>selected<?php endif; ?>>Normandie</option>
        <option value="Nouvelle-Aquitaine" <?php if ($region === 'Nouvelle-Aquitaine'): ?>selected<?php endif; ?>>Nouvelle-Aquitaine</option>
        <option value="Occitanie" <?php if ($region === 'Occitanie'): ?>selected<?php endif; ?>>Occitanie</option>
        <option value="Pays de la Loire" <?php if ($region === 'Pays de la Loire'): ?>selected<?php endif; ?>>Pays de la Loire</option>
        <option value="Provence-Alpes-Côte d'Azur" <?php if ($region === "Provence-Alpes-Côte d'Azur"): ?>selected<?php endif; ?>>Provence-Alpes-Côte d'Azur</option>
    </select>
    <?php if ($regionError !== ''): ?>
        <p style="color: red;"><?php echo $regionError; ?></p>
    <?php endif; ?>

    <label for="date">Date</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
    <?php if ($dateError !== ''): ?>
        <p style="color: red;"><?php echo $dateError; ?></p>
    <?php endif; ?>

    <label for="name">Nom de l'événement</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
    <?php if ($nameError !== ''): ?>
        <p style="color: red;"><?php echo $nameError; ?></p>
    <?php endif; ?>

    <label for="description">Description de l'événement</label>
    <textarea id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>
    <?php if ($descriptionError !== ''): ?>
        <p style="color: red;"><?php echo $descriptionError; ?></p>
    <?php endif; ?>

    <input type="submit" value="Créer l'événement">
</form>

<?php
require_once './components/footer.php';
displayFooter();
