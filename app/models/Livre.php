<?php
class Livre
{
    // Liste des livres avec le nombre d'exemplaires disponibles, filtrable par titre ou auteur
    public static function all(string $q = ''): array
    {
        $like = '%' . $q . '%';
        $stmt = Database::getConnection()->prepare(
            'SELECT l.*, l.nb_exemplaires - (
                SELECT COUNT(*) FROM emprunts e WHERE e.livre_id = l.id AND e.date_retour IS NULL
             ) AS disponibles
             FROM livres l
             WHERE l.titre LIKE ? OR l.auteur LIKE ?
             ORDER BY l.titre'
        );
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM livres WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function disponibles(int $id): int
    {
        $stmt = Database::getConnection()->prepare(
            'SELECT l.nb_exemplaires - COUNT(e.id)
             FROM livres l
             LEFT JOIN emprunts e ON e.livre_id = l.id AND e.date_retour IS NULL
             WHERE l.id = ?
             GROUP BY l.id, l.nb_exemplaires'
        );
        $stmt->execute([$id]);
        return (int) $stmt->fetchColumn();
    }

    // $id === null : création, sinon modification
    public static function save(?int $id, array $d): void
    {
        $values = [$d['titre'], $d['auteur'], $d['categorie'], $d['annee'], $d['nb_exemplaires']];
        if ($id === null) {
            $sql = 'INSERT INTO livres (titre, auteur, categorie, annee, nb_exemplaires) VALUES (?, ?, ?, ?, ?)';
        } else {
            $sql = 'UPDATE livres SET titre = ?, auteur = ?, categorie = ?, annee = ?, nb_exemplaires = ? WHERE id = ?';
            $values[] = $id;
        }
        Database::getConnection()->prepare($sql)->execute($values);
    }

    public static function delete(int $id): void
    {
        Database::getConnection()->prepare('DELETE FROM livres WHERE id = ?')->execute([$id]);
    }
}
