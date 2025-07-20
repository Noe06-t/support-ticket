<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Soumettre un ticket</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="form-container w-100" style="max-width: 400px;">
            <h1>Entrez vos informations</h1>
            <form action="submit_ticket.php" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Prenom" class="form-label">Prénom :</label>
                    <input type="text" id="Prenom" name="Prenom" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS (optionnel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
        body {
            background: #0a2342;
            color: #e3eefd;
            min-height: 100vh;
        }
        .form-container {
            background: #112d4e;
            border-radius: 12px;
            box-shadow: 0 0 20px #0008;
            padding: 2rem 2.5rem;
            margin-top: 5vh;
        }
        .form-label {
            color: #a2c6f5;
        }
        .btn-primary {
            background: #2563eb;
            border: none;
        }
        .btn-primary:hover {
            background: #1e40af;
        }
        h1 {
            color: #60a5fa;
            text-align: center;
            margin-bottom: 2rem;
        }
    </style>