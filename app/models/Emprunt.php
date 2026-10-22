<?php
class Emprunt
{
    public static function enCours(): array
    {
        return Database::getConnection()->query(
            'SELECT e.id, e.date_emprunt, l.titre, a.nom, a.prenom
             FROM emprunts e
             JOIN livres l ON l.id = e.livre_id
             JOIN adherents a ON a.id = e.adherent_id
             WHERE e.date_retour IS NULL
             ORDER BY e.date_emprunt'
        )->fetchAll();
    }

    // Règle métier : refuser l'emprunt si aucun exemplaire n'est disponible
    public static function create(int $livreId, int $adherentId): bool
    {
        if (Livre::disponibles($livreId) <= 0) {
            return false;
        }
        $stmt = Database::getConnection()->prepare(
            'INSERT INTO emprunts (livre_id, adherent_id, date_emprunt) VALUES (?, ?, CURDATE())'
        );
        return $stmt->execute([$livreId, $adherentId]);
    }

    public static function retour(int $id): void
    {
        Database::getConnection()->prepare(
            'UPDATE emprunts SET date_retour = CURDATE() WHERE id = ? AND date_retour IS NULL'
        )->execute([$id]);
    }
}
