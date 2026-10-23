<?php
namespace App\Models;

use PDO;

/**
 * Class Book
 *
 * Handles all database operations (SQL queries, insertions, joins)
 * specifically related to the `Books` database table.
 *
 * @package App\Models
 * @author Senzo Earl Maseko
 */
class Book {
    /**
     * @var PDO $db Active database connection instance.
     */
    private PDO $db;

    /**
     * Book Model Constructor.
     *
     * @param PDO $db Injected database connection handle.
     */
    public function __construct(PDO $db) {
        $this->db = $db; // Assign the injected PDO object to the model property
    }

    /**
     * Fetches all books along with their joined relational details (Author, Genre, Publisher, etc.).
     * Supports optional string filtering on book title, author name, or genre.
     *
     * @param string $search Optional search keyword provided by the user.
     * @return array List of books with foreign key IDs mapped to readable names.
     */
    public function getAllWithRelations(string $search = ''): array {
        // SQL query joining the main Books table with reference tables via foreign keys
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

        // If a search query was supplied, append a WHERE clause filtering by key fields
        if (!empty($search)) {
            $sql .= " WHERE b.name LIKE :search OR a.name LIKE :search OR g.name LIKE :search";
            $stmt = $this->db->prepare($sql); // Prepare SQL statement to prevent injection
            $stmt->execute(['search' => '%' . $search . '%']); // Bind search parameter with wildcards
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return array of matching records
        }

        // Execute and return all records directly if no search filter was provided
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserts a new book record into the `Books` database table using prepared statements.
     *
     * @param array $data Form data array containing book properties.
     * @return bool True on successful insert, false on failure.
     */
    public function create(array $data): bool {
        // Prepare the SQL query with named placeholders for security
        $stmt = $this->db->prepare("
            INSERT INTO Books (name, price, author_id, language_id, genre_id, publisher_id, country_id) 
            VALUES (:name, :price, :author_id, :language_id, :genre_id, :publisher_id, :country_id)
        ");

        // Execute the prepared query by binding the input parameters
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