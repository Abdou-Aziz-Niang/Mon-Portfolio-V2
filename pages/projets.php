<?php
// On inclut la connexion à la base de données et les fonctions
require_once '../db.php';
require_once '../fonctions.php';

// On récupère les projets depuis la base de données
$query = $pdo->query("SELECT * FROM projets");
$mes_projets = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Projets | Réalisations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* On garde exactement ton style actuel */
        .project-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: 15px;
        }
        
        .skill-card.project-card {
            padding: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        
        .project-card h3, .project-card p, .project-card .badges, .project-card .project-links {
            padding: 0 20px;
        }

        .project-card p {
            font-size: 0.9rem;
            color: #555;
            flex-grow: 1; 
        }
        
        .project-card .badges {
            margin-top: 10px;
        }

        .project-links {
            padding-bottom: 20px;
            margin-top: 15px;
        }

        .github-link {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.85rem;
            transition: background 0.3s ease;
        }

        .github-link:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php require_once '../composants/navigation.php'; ?>

    <main class="about-container">
        <section class="hero-section">
            <h1>Mes Réalisations</h1>
             <div style="text-align: center; margin: 30px 0; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd;">
                <p style="margin-bottom: 10px; font-weight: bold;">Rechercher un projet par mot-clé :</p>
                <form action="#">
                    <input type="text" placeholder="Ex: Arduino, PHP, MySQL..." style="padding: 10px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
                    <button type="submit" style="padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Filtrer</button>
                </form>
            </div>
            <p>Voici les projets techniques sur lesquels j'ai travaillé, illustrés par des captures d'écran.</p>
        </section>

        <div class="skills-grid">
            
            <?php foreach($mes_projets as $p): ?>
            <article class="skill-card project-card">
                <!-- On utilise le chemin d'image venant de la base de données -->
                <img src="<?php echo $p['image']; ?>" alt="<?php echo e($p['titre']); ?>" class="project-img">
                
                <h3><?php echo e($p['titre']); ?></h3>
                
                <p><?php echo e($p['description']); ?></p>
                
                <div class="badges">
                    <span class="badge"><?php echo e($p['badge']); ?></span>
                </div>
                
                <div class="project-links">
                    <a href="#" target="_blank" class="github-link">
                        <i class="fab fa-github"></i> Voir le code
                    </a>
                </div>
            </article>
            <?php endforeach; ?>

        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2026 - Portfolio Professionnel | Développeur & Administrateur Réseau</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
                <a href="#"><i class="fab fa-github"></i> GitHub</a>
            </div>
        </div>
    </footer>
</body>
</html>