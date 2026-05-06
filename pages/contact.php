<?php
require_once '../db.php';
require_once '../fonctions.php';

$confirmation = "";
$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = e($_POST['nom'] ?? '');
    $email = $_POST['email'] ?? ''; 
    $message = e($_POST['message'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "L'adresse email n'est pas valide.";
    } elseif (empty($nom) || empty($message)) {
        $erreur = "Tous les champs sont obligatoires.";
    } else {
        // ENREGISTREMENT DANS LA BASE DE DONNÉES
        $stmt = $pdo->prepare("INSERT INTO messages (nom, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $message]);
        
        $confirmation = "Merci <strong>$nom</strong> ! Votre message a été enregistré avec succès.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact | Portfolio</title>
    <style>
        :root { --primary: #2563eb; --bg: #f8fafc; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); margin: 0; }
        .container { max-width: 600px; margin: 60px auto; padding: 20px; }
        .card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .alert { padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        .error { background: #fee2e2; color: #991b1b; }
        .success { background: #dcfce7; color: #166534; }
        input, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #e2e8f0; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; background: var(--primary); color: white; padding: 14px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <?php require_once '../composants/navigation.php'; ?>
    <div class="container">
        <div class="card">
            <h2>Me contacter</h2>
            <?php if($erreur) echo "<div class='alert error'>$erreur</div>"; ?>
            <?php if($confirmation) echo "<div class='alert success'>$confirmation</div>"; ?>
            <form method="POST">
                <input type="text" name="nom" placeholder="Votre Nom" required>
                <input type="email" name="email" placeholder="Votre Email" required>
                <textarea name="message" rows="5" placeholder="Votre Message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</body>
</html>