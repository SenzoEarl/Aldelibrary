<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Lookup;
use PDO;

/**
 * Class BookController
 *
 * Coordinates business logic, input processing, model queries,
 * and view rendering for library operations.
 *
 * @package App\Controllers
 * @author Senzo Earl Maseko
 */
class BookController
{
    /**
     * @var Book $bookModel Handles data access for books.
     */
    private Book $bookModel;

    /**
     * @var Lookup $lookupModel Handles data access for lookup reference tables.
     */
    private Lookup $lookupModel;

    /**
     * BookController Constructor.
     *
     * @param PDO $db Database connection object passed to instantiate models.
     */
    public function __construct(PDO $db)
    {
        $this->bookModel = new Book($db);   // Instantiate the Book model
        $this->lookupModel = new Lookup($db); // Instantiate the Lookup model
    }

    /**
     * Renders the main dashboard index page showing catalog records and stats.
     *
     * @return void
     */
    public function index(): void
    {
        // Capture and sanitize optional search query parameter from the URL query string
        $search = $_GET['search'] ?? '';

        // Retrieve book list from the model matching the search parameter
        $books = $this->bookModel->getAllWithRelations($search);

        // Calculate dynamic statistical indicators for top widget cards
        $totalBooks = count($books);
        $totalAuthors = count($this->lookupModel->getTableData('Author'));
        $totalPublishers = count($this->lookupModel->getTableData('Publisher'));

        // Load the main view layout file
        require_once __DIR__ . '/../Views/books/index.php';
    }

    /**
     * Renders the "Add New Book" form page with dropdown options.
     *
     * @return void
     */
    public function create(): void
    {
        // Load all options from lookup tables to populate form drop-down selections
        $authors = $this->lookupModel->getTableData('Author');
        $languages = $this->lookupModel->getTableData('Language');
        $genres = $this->lookupModel->getTableData('Genre');
        $publishers = $this->lookupModel->getTableData('Publisher');
        $countries = $this->lookupModel->getTableData('Country');

        // Load the create view template
        require_once __DIR__ . '/../Views/books/create.php';
    }

    /**
     * Handles POST submission to create and save a new book record.
     *
     * @return void
     */
    public function store(): void
    {
        // Ensure request method is POST before processing form input
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Trim whitespace from title and convert price input to float
            $name = trim($_POST['name'] ?? '');
            $price = floatval($_POST['price'] ?? 0);

            // Basic server-side field validation
            if (!empty($name) && $price > 0) {
                // Insert book via model
                $this->bookModel->create($_POST);

                // Redirect back to main page with success status query flag
                header('Location: index.php?status=success');
                exit;
            }
        }

        // Redirect back to form with error indicator if validation fails
        header('Location: index.php?action=create&status=error');
        exit;
    }
}