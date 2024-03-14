<?php
session_start();

require_once './classes/Db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: admin_Login.php');
    exit();
}

require_once './components/header.php';
displayHeader();

$db = new Db('./csv/events.csv');
$data = $db->readFromCsv();
echo '<h1 class="main-content">Listes des évenements</h1> ';
if (!empty($data)) {
    echo '<div class="card-content">';
    foreach ($data as $row) {
        echo '<div class="card">';
        echo '<h3>' . htmlspecialchars($row[2]) . '</h3>';
        echo '<p><strong>Région:</strong> ' . htmlspecialchars($row[0]) . '</p>';
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($row[1]) . '</p>';
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($row[3]) . '</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>Aucun événement trouvé.</p>';
}
?>
<div class="button-wrapper">
    <a href="./admin_Form.php">Formulaire</a>
    <a href="./admin_Logout.php">Déconnexion</a>
</div>
    
<?php
require_once './components/footer.php';
displayFooter();
?>

</body>

</html>
<script src="././script/menu-burger.js"></script>