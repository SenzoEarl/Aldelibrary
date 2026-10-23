<?php
namespace App\Models;

use PDO;

/**
 * Class Lookup
 *
 * Fetches option records from standalone reference/lookup tables
 * (e.g., Author, Genre, Country) to populate form dropdowns.
 *
 * @package App\Models
 * @author Senzo Earl Maseko
 */
class Lookup {
    /**
     * @var PDO $db Active database connection instance.
     */
    private PDO $db;

    /**
     * Lookup Model Constructor.
     *
     * @param PDO $db Injected database connection instance.
     */
    public function __construct(PDO $db) {
        $this->db = $db; // Store the database handle
    }

    /**
     * Fetches all records from a specified lookup table safely using strict whitelist checking.
     *
     * @param string $tableName Name of the database table to query.
     * @return array Array of records from the requested table, or empty array if invalid.
     */
    public function getTableData(string $tableName): array {
        // Whitelist permitted table names to prevent SQL injection via dynamic table names
        $allowedTables = ['Author', 'Language', 'Genre', 'Publisher', 'Country'];

        // Return an empty array if an unapproved table name is passed
        if (!in_array($tableName, $allowedTables)) {
            return [];
        }

        // Execute query against the verified table and fetch all records
        $stmt = $this->db->query("SELECT * FROM `" . $tableName . "`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}