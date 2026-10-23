<?php
namespace App\Controllers;

use App\Models\Book;
use App\Models\Lookup;
use PDO;

/**
 * Class DashboardController
 *
 * Manages rendering of overview analytics and system status metrics.
 *
 * @package App\Controllers
 * @author Senzo Earl Maseko
 */
class DashboardController {
    /**
     * @var Book $bookModel Handles data access for books.
     */
    private Book $bookModel;

    /**
     * @var Lookup $lookupModel Handles lookup data access.
     */
    private Lookup $lookupModel;

    /**
     * DashboardController Constructor.
     *
     * @param PDO $db Active PDO connection handle.
     */
    public function __construct(PDO $db) {
        $this->bookModel   = new Book($db);   // Instantiate Book data model
        $this->lookupModel = new Lookup($db); // Instantiate Lookup data model
    }

    /**
     * Aggregates entity totals and renders the system dashboard overview.
     *
     * @return void
     */
    public function index(): void {
        // Fetch count metrics across all relational reference tables
        $totalBooks      = count($this->bookModel->getAllWithRelations());
        $totalAuthors    = count($this->lookupModel->getTableData('Author'));
        $totalPublishers = count($this->lookupModel->getTableData('Publisher'));
        $totalGenres     = count($this->lookupModel->getTableData('Genre'));

        // Load the dashboard view template
        require_once __DIR__ . '/../Views/dashboard/index.php';
    }
}