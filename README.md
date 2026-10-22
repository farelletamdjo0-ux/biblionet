# BiblioNet

Application de gestion de bibliothèque (mini-projet MVC, PHP 8.x, MySQL, PDO).

## Installation locale (XAMPP)

1. Copier le dossier `biblionet` dans `C:\xampp\htdocs\`.
2. Démarrer Apache et MySQL dans le panneau XAMPP.
3. Importer `database/biblionet.sql` dans phpMyAdmin.
4. Copier `.env.example` en `.env` (les valeurs par défaut conviennent en local).
5. Ouvrir `http://localhost/biblionet/public`.

## Compte de démonstration

- Email : `demo@biblionet.ga`
- Mot de passe : `Demo2026!`

## Structure

- `app/core` : Router, Controller, Database
- `app/controllers`, `app/models`, `app/views` : couches MVC
- `config/` : chargement du fichier `.env`
- `database/` : script SQL de création et données de test
- `public/` : seul dossier exposé au web (front controller `index.php`)
