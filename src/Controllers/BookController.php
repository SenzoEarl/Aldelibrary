<?php
namespace App\Controllers;

use App\Models\Book;
use App\Models\Lookup;
use PDO;

/**
 * Class BookController
 *
 * Manages inventory catalog rendering, searching, and creation.
 *
 * @package App\Controllers
 * @author Senzo Earl Maseko
 */
class BookController {
    private Book $bookModel;
    private Lookup $lookupModel;

    public function __construct(PDO $db) {
        $this->bookModel   = new Book($db);
        $this->lookupModel = new Lookup($db);
    }

    /**
     * Renders catalog table view.
     */
    public function index(): void {
        $search = $_GET['search'] ?? '';
        $books  = $this->bookModel->getAllWithRelations($search);

        require_once __DIR__ . '/../Views/books/index.php';
    }

    /**
     * Renders book creation form view with lookup options.
     */
    public function create(): void {
        $authors    = $this->lookupModel->getTableData('Author');
        $languages  = $this->lookupModel->getTableData('Language');
        $genres     = $this->lookupModel->getTableData('Genre');
        $publishers = $this->lookupModel->getTableData('Publisher');
        $countries  = $this->lookupModel->getTableData('Country');

        require_once __DIR__ . '/../Views/books/create.php';
    }

    /**
     * Handles POST submission to create new book.
     */
    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name  = trim($_POST['name'] ?? '');
            $price = floatval($_POST['price'] ?? 0);

            if (!empty($name) && $price > 0) {
                $this->bookModel->create($_POST);
                header('Location: index.php?status=success');
                exit;
            }
        }

        header('Location: index.php?action=create&status=error');
        exit;
    }
}