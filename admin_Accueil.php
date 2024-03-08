<?php
require_once './classes/Db.php';
require_once './components/header.php';
displayHeader();

$db = new Db('./csv/events.csv');
$data = $db->readFromCsv();

if (!empty($data)) {
    echo '<div class="main-content">';
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
<a href="./admin_Form.php">Formulaire</a>


<?php
require_once './components/footer.php';
displayFooter();
?>

</body>

</html>
<script src="././script/menu-burger.js"></script>
