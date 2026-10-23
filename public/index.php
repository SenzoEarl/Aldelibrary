<?php
/**
 * Application Front Controller / Router
 *
 * Intercepts incoming web requests, registers class autoloading,
 * connects to MariaDB, and routes requests to controllers.
 *
 * @author Senzo Earl Maseko
 */

// Register PSR-4 simulation autoloader to dynamically include class files
spl_autoload_register(function ($class) {
    $prefix  = 'App\\';            // Root namespace prefix
    $baseDir = __DIR__ . '/../src/'; // Physical directory mapping for source files
    $len     = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Skip if class does not match namespace
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file; // Require class file if found
    }
});

use App\Config\Database;
use App\Controllers\BookController;
use App\Controllers\DashboardController;

// Initialize shared Singleton database connection
$db = Database::getConnection();

// Extract requested action from URL GET parameter (defaulting to 'index')
$action = $_GET['action'] ?? 'index';

// Route requests to appropriate controller actions
switch ($action) {
    case 'dashboard':
        $dashboardController = new DashboardController($db);
        $dashboardController->index(); // Render system dashboard / stats view
        break;
    case 'create':
        $bookController = new BookController($db);
        $bookController->create(); // Render create book form
        break;
    case 'store':
        $bookController = new BookController($db);
        $bookController->store(); // Process form persistence
        break;
    case 'index':
    default:
        $bookController = new BookController($db);
        $bookController->index(); // Render inventory catalog index
        break;
}