<?php
// Chargement du fichier .env (à la racine du projet)
$envFile = ROOT_PATH . '/.env';
if (!is_file($envFile)) {
    exit('Fichier .env introuvable : copie .env.example en .env.');
}
foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    $line = trim($line);
    if ($line === '' || $line[0] === '#' || !str_contains($line, '=')) {
        continue;
    }
    [$key, $value] = explode('=', $line, 2);
    $_ENV[trim($key)] = trim($value);
}

if (($_ENV['APP_ENV'] ?? 'production') === 'development') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
}

// Chemin de base : /biblionet/public en local, vide en ligne
define('BASE_URL', rtrim((string) parse_url($_ENV['APP_URL'] ?? '', PHP_URL_PATH), '/'));

// Échappement HTML (protection anti-XSS)
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
