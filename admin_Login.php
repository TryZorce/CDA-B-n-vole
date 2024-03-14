<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifiez les informations de connexion ici
    if ($username === 'admin' && $password === 'password') {
        // Si les informations de connexion sont valides, stockez le nom d'utilisateur et le rôle dans une variable de session
        // et redirigez l'utilisateur vers la page d'accueil du panneau d'administration
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: admin_Accueil.php');
    } else {
        // Si les informations de connexion sont invalides, stockez un message d'erreur dans une variable de session
        $_SESSION['error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
        // Redirigez l'utilisateur vers la page de connexion
        header('Location: admin_Login.php');
    }
    // Arrêtez l'exécution du script ici pour éviter d'envoyer du contenu HTML supplémentaire
    exit();
}

// Vérifiez si l'utilisateur a un rôle dans sa session
if (isset($_SESSION['role'])) {
    // Vérifier la valeur du rôle
    if ($_SESSION['role'] == 'utilisateur') {
        header('Location: index.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('Location: admin_Accueil.php');
    }
    // Arrêtez l'exécution du script ici pour éviter d'envoyer du contenu HTML supplémentaire
    exit();
}

// Include the header after all the PHP processing
require_once './components/header.php';
displayHeader();

// Affichez le message d'erreur s'il existe
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