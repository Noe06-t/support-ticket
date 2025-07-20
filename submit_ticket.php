<?php
// Vérifie si la requête est de type POST (formulaire soumis)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nom = htmlspecialchars($_POST['nom']);
    $Prenom = htmlspecialchars($_POST['Prenom']);

    // Génère un identifiant unique pour le ticket
    $id = uniqid('ticket_', true);
    // Récupère la date et l'heure actuelles au format spécifié
    $date = date('Y-m-d_H-i-s');
    // Définit le chemin et le nom du fichier où sera stocké le ticket
    $filename = __DIR__ . "/tickets/{$date}_{$id}.txt";
    // Prépare le contenu du ticket à enregistrer dans le fichier
    $content = "ID: $id\nDate: $date\nNom: $nom\nPrenom: $Prenom\n";
    // Écrit le contenu dans le fichier
    file_put_contents($filename, $content);
    // Affiche un message de succès stylisé à l'utilisateur et le contenu de son ticket
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ticket soumis</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background: #0a2342; color: #e3eefd; }
            .success-container { background: #112d4e; border-radius: 12px; box-shadow: 0 0 20px #0008; padding: 2rem 2.5rem; margin-top: 10vh; }
            .btn-primary { background: #2563eb; border: none; }
            .btn-primary:hover { background: #1e40af; }
            .ticket-box { background: #19376d; border-radius: 8px; border: 1px solid #2563eb; margin: 20px 0; padding: 1rem 1.5rem; color: #e3eefd; text-align:left; }
        </style>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
            <div class="success-container w-100" style="max-width: 500px; text-align:center;">
                <h2 class="mb-4" style="color:#60a5fa;">Ticket soumis</h2>
                <div class="alert alert-success" role="alert">
                    Votre ticket a été soumis avec succès !
                </div>
                <div class="ticket-box text-start">
                    <strong>Votre ticket :</strong><br>
                    <?php echo nl2br(htmlspecialchars($content)); ?>
                </div>
                <a href="index.php" class="btn btn-primary mt-3">Retour</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
} else {
    // Redirige vers la page d'accueil si la requête n'est pas de type POST
    header('Location: index.php');
    exit();
}
?>
