<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: admin_Accueil.php');
    } else {
        $_SESSION['error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
        header('Location: admin_Login.php');
    }
    exit();
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'utilisateur') {
        header('Location: index.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('Location: admin_Accueil.php');
    }
    exit();
}

require_once './components/header.php';
displayHeader();
if (isset($_SESSION['error'])) {
    echo '<p>' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connexion à l'espace d'administration</title>
</head>

<body>
    <div class="main-content">

        <h1>Connexion à l'espace d'administration</h1>
        <form method="post" class="form-content">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" placeholder="admin" required>
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="password" required>
            <br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>

</html>

<?php
require_once './components/footer.php';
displayFooter();
?>