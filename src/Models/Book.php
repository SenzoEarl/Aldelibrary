<?php
namespace App\Models;

use PDO;

/**
 * Class Book
 *
 * Handles database operations for the Books entity.
 *
 * @package App\Models
 * @author Senzo Earl Maseko
 */
class Book {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Fetches all books with joined details and safe search filtering.
     *
     * @param string $search Optional keyword search parameter.
     * @return array
     */
    public function getAllWithRelations(string $search = ''): array {
        $sql = "SELECT b.book_id, b.name AS book_name, b.price, 
                       a.name AS author_name, l.name AS language_name, 
                       g.name AS genre_name, p.name AS publisher_name, 
                       c.name AS country_name
                FROM Books b
                LEFT JOIN Author a ON b.author_id = a.author_id
                LEFT JOIN Language l ON b.language_id = l.language_id
                LEFT JOIN Genre g ON b.genre_id = g.genre_id
                LEFT JOIN Publisher p ON b.publisher_id = p.publisher_id
                LEFT JOIN Country c ON b.country_id = c.country_id";

        if (!empty($search)) {
            // Use unique named parameters for each field to satisfy native PDO prepared statements
            $sql .= " WHERE b.name LIKE :s1 OR a.name LIKE :s2 OR g.name LIKE :s3";
            $stmt = $this->db->prepare($sql);

            $searchParam = '%' . $search . '%';
            $stmt->execute([
                's1' => $searchParam,
                's2' => $searchParam,
                's3' => $searchParam
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserts a new book record.
     *
     * @param array $data Form payload.
     * @return bool
     */
    public function create(array $data): bool {
        $stmt = $this->db->prepare("
            INSERT INTO Books (name, price, author_id, language_id, genre_id, publisher_id, country_id) 
            VALUES (:name, :price, :author_id, :language_id, :genre_id, :publisher_id, :country_id)
        ");

        return $stmt->execute([
            'name'         => $data['name'],
            'price'        => $data['price'],
            'author_id'    => $data['author_id'],
            'language_id'  => $data['language_id'],
            'genre_id'     => $data['genre_id'],
            'publisher_id' => $data['publisher_id'],
            'country_id'   => $data['country_id']
        ]);
    }
}