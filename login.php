<?php
// Démarre la session pour gérer l'authentification admin
session_start();

// Définition du mot de passe admin (à personnaliser pour plus de sécurité)
$mdp = 'admin123'; // À modifier pour plus de sécurité

// Si l'admin est déjà connecté, on redirige vers admin.php
envoyerVersAdmin();

// Vérifie si le formulaire de connexion a été soumis
if (isset($_POST['password'])) {
    if ($_POST['password'] === $mdp) {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $error = 'Mot de passe incorrect.';
    }
}

// Affiche le formulaire de connexion
function envoyerVersAdmin() {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        header('Location: admin.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #0a2342; color: #e3eefd; }
        .login-container { background: #112d4e; border-radius: 12px; box-shadow: 0 0 20px #0008; padding: 2rem 2.5rem; margin-top: 10vh; }
        .form-label { color: #a2c6f5; }
        .btn-primary { background: #2563eb; border: none; }
        .btn-primary:hover { background: #1e40af; }
        h2 { color: #60a5fa; text-align: center; margin-bottom: 2rem; }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="login-container w-100" style="max-width: 400px;">
            <h2>Connexion Admin</h2>
            <?php if (isset($error)) echo '<p style="color:red;">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
