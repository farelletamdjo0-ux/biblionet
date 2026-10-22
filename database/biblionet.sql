

CREATE DATABASE IF NOT EXISTS biblionet CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblionet;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS emprunts;
DROP TABLE IF EXISTS adherents;
DROP TABLE IF EXISTS livres;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(200) NOT NULL,
    auteur VARCHAR(150) NOT NULL,
    categorie VARCHAR(100),
    annee INT,
    nb_exemplaires INT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE adherents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    classe VARCHAR(50),
    telephone VARCHAR(30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE emprunts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livre_id INT NOT NULL,
    adherent_id INT NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour DATE NULL,
    FOREIGN KEY (livre_id) REFERENCES livres(id),
    FOREIGN KEY (adherent_id) REFERENCES adherents(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO users (nom, email, password) VALUES
('Bibliothécaire Démo', 'demo@biblionet.ga', '$2y$10$4kZgkADfWok745HQhNyGiu4M5YGPra5na5oT5aVomtAQiYJIoiNym');

INSERT INTO livres (titre, auteur, categorie, annee, nb_exemplaires) VALUES
('Le Petit Prince', 'Antoine de Saint-Exupéry', 'Jeunesse', 1943, 3),
('L''Étranger', 'Albert Camus', 'Roman', 1942, 2),
('Une si longue lettre', 'Mariama Bâ', 'Roman', 1979, 2),
('Les Soleils des indépendances', 'Ahmadou Kourouma', 'Roman', 1968, 2),
('Ville cruelle', 'Mongo Beti', 'Roman', 1954, 1),
('Une vie de boy', 'Ferdinand Oyono', 'Roman', 1956, 2),
('Le Malade imaginaire', 'Molière', 'Théâtre', 1673, 2),
('Germinal', 'Émile Zola', 'Roman', 1885, 2),
('Les Misérables', 'Victor Hugo', 'Roman', 1862, 1),
('Candide', 'Voltaire', 'Conte', 1759, 2),
('Vipère au poing', 'Hervé Bazin', 'Roman', 1948, 1),
('Le Comte de Monte-Cristo', 'Alexandre Dumas', 'Aventure', 1844, 1),
('Les Fourmis', 'Bernard Werber', 'Science-fiction', 1991, 2),
('La Communauté de l''anneau', 'J.R.R. Tolkien', 'Fantasy', 1954, 1),
('Mathématiques 3e', 'Collectif', 'Scolaire', 2020, 4),
('Physique-Chimie 2de', 'Collectif', 'Scolaire', 2019, 3),
('Le Petit Robert', 'Collectif', 'Dictionnaire', 2020, 2);

INSERT INTO adherents (nom, prenom, classe, telephone) VALUES
('Mbadinga', 'Aminata', '3e A', '+241 07 10 20 30'),
('Nzue', 'Brice', '3e A', '+241 07 11 22 33'),
('Obiang', 'Carine', '2de B', '+241 06 21 32 43'),
('Mougoué', 'Daniel', '2de B', '+241 07 31 41 51'),
('Ndong', 'Estelle', 'Terminale C', '+241 06 40 50 60'),
('Mba', 'Franck', 'Terminale C', '+241 07 55 66 77'),
('Essono', 'Grâce', '1re D', '+241 06 12 23 34'),
('Moussavou', 'Hervé', '1re D', '+241 07 45 56 67'),
('Mintsa', 'Ismaël', '6e', '+241 06 78 89 90'),
('Bekale', 'Joëlle', '5e', '+241 07 98 87 76'),
('Ondo', 'Kevin', '4e', '+241 06 13 24 35'),
('Akomo', 'Laurence', 'Seconde A', '+241 07 36 47 58');

INSERT INTO emprunts (livre_id, adherent_id, date_emprunt, date_retour) VALUES
(2, 2, '2026-09-01', '2026-09-15'),
(3, 4, '2026-09-03', '2026-09-17'),
(7, 6, '2026-08-20', '2026-09-02'),
(8, 7, '2026-09-10', '2026-09-24'),
(10, 9, '2026-09-28', '2026-10-08'),
(13, 11, '2026-10-02', '2026-10-12'),
(1, 1, '2026-10-01', NULL),
(1, 5, '2026-10-10', NULL),
(4, 12, '2026-10-05', NULL),
(9, 3, '2026-09-25', NULL),
(5, 8, '2026-10-15', NULL),
(15, 10, '2026-10-18', NULL);
