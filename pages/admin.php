<?php
require_once '../db.php';
require_once '../fonctions.php';

// On récupère les messages du plus récent au plus ancien
$query = $pdo->query("SELECT * FROM messages ORDER BY date_envoi DESC");
$messages = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration | Messages</title>
    <style>
        :root { --primary: #2563eb; --bg: #f1f5f9; --text: #1e293b; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); color: var(--text); margin: 0; }
        .container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        h1 { color: var(--text); border-left: 5px solid var(--primary); padding-left: 15px; }
        
        /* Style du tableau */
        .table-container { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f8fafc; color: #64748b; text-align: left; padding: 15px; font-size: 0.85rem; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; }
        td { padding: 15px; border-bottom: 1px solid #f1f5f9; font-size: 0.95rem; vertical-align: top; }
        tr:hover { background: #fdfdfd; }
        
        .email-link { color: var(--primary); text-decoration: none; font-weight: 500; }
        .date { color: #94a3b8; font-size: 0.8rem; }
        .msg-text { color: #475569; line-height: 1.4; }
    </style>
</head>
<body>
    <?php require_once '../composants/navigation.php'; ?>

    <div class="container">
        <h1>Gestion des Messages</h1>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Expéditeur</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($messages)): ?>
                        <tr><td colspan="3" style="text-align:center; padding: 30px;">Aucun message reçu pour le moment.</td></tr>
                    <?php endif; ?>

                    <?php foreach($messages as $m): ?>
                        <tr>
                            <td class="date"><?php echo date('d/m/Y H:i', strtotime($m['date_envoi'])); ?></td>
                            <td>
                                <strong><?php echo $m['nom']; ?></strong><br>
                                <a href="mailto:<?php echo $m['email']; ?>" class="email-link"><?php echo $m['email']; ?></a>
                            </td>
                            <td class="msg-text"><?php echo nl2br($m['message']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>