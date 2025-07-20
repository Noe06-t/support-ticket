<?php
// Démarre la session pour vérifier l'authentification admin
session_start();

// Si l'utilisateur n'est pas authentifié, on le redirige vers login.php
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Gestion de la déconnexion admin
if (isset($_GET['logout'])) {
    session_destroy(); // Détruit la session
    header('Location: login.php'); // Redirige vers la page de connexion
    exit();
}

// Partie affichage des tickets si l'admin est connecté
$tickets_dir = __DIR__ . '/tickets'; // Dossier où sont stockés les tickets
$files = glob($tickets_dir . '/*.txt'); // Récupère tous les fichiers .txt (tickets)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container d-flex justify-content-center align-items-start" style="min-height:100vh;">
        <div class="admin-container w-100" style="max-width: 700px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Liste des tickets</h2>
                <a href="?logout=1" class="btn btn-primary logout-link">Déconnexion</a>
            </div>
            <?php if (!$files): ?>
                <div class="alert alert-info text-center">Aucun ticket trouvé.</div>
            <?php else: ?>
                <?php foreach ($files as $file): ?>
                    <div class="ticket-box">
                        <?php echo nl2br(htmlspecialchars(file_get_contents($file))); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
        body { background: #0a2342; color: #e3eefd; }
        .admin-container { background: #112d4e; border-radius: 12px; box-shadow: 0 0 20px #0008; padding: 2rem 2.5rem; margin-top: 5vh; }
        .btn-primary { background: #2563eb; border: none; }
        .btn-primary:hover { background: #1e40af; }
        h2 { color: #60a5fa; text-align: center; margin-bottom: 2rem; }
        .ticket-box { background: #19376d; border-radius: 8px; border: 1px solid #2563eb; margin-bottom: 15px; padding: 1rem 1.5rem; color: #e3eefd; }
        .logout-link { float: right; }
        @media (max-width: 600px) { .admin-container { padding: 1rem 0.5rem; } }
    </style>