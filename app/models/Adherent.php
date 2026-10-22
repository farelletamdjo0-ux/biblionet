<?php
class Adherent
{
    public static function all(): array
    {
        return Database::getConnection()->query('SELECT * FROM adherents ORDER BY nom, prenom')->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM adherents WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    // $id === null : création, sinon modification
    public static function save(?int $id, array $d): void
    {
        $values = [$d['nom'], $d['prenom'], $d['classe'], $d['telephone']];
        if ($id === null) {
            $sql = 'INSERT INTO adherents (nom, prenom, classe, telephone) VALUES (?, ?, ?, ?)';
        } else {
            $sql = 'UPDATE adherents SET nom = ?, prenom = ?, classe = ?, telephone = ? WHERE id = ?';
            $values[] = $id;
        }
        Database::getConnection()->prepare($sql)->execute($values);
    }

    public static function delete(int $id): void
    {
        Database::getConnection()->prepare('DELETE FROM adherents WHERE id = ?')->execute([$id]);
    }
}
