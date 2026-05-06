<?php
/**
 * Fichier de fonctions réutilisables - Projet Portfolio
 * Regroupe la logique commune à toutes les pages.
 */

/**
 * Génère une URL propre pour le projet
 * @param string $path Le chemin vers le fichier (ex: 'index.php' ou 'pages/contact.php')
 * @return string L'URL complète pour le localhost
 */
function url($path) {
    // On définit le dossier racine de ton projet dans htdocs
    $baseUrl = "/portfolio/";
    
    // On nettoie le chemin pour éviter les doubles slashs et on retourne l'URL
    return $baseUrl . ltrim($path, '/');
}

/**
 * Nettoie les données pour éviter les failles XSS
 * @param string $data La donnée à nettoyer
 * @return string La donnée sécurisée
 */
function e($data) {
    return htmlspecialchars(trim($data));
}
?>