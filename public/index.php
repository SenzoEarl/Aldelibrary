<?php
/**
 * Application Front Controller / Entry Point Router
 *
 * Intercepts all web requests, initializes class autoloading,
 * connects to MariaDB, and routes requests to BookController.
 *
 * @author Senzo Earl Maseko
 */

// Register custom PSR-4 simulation autoloader to dynamically load class files
spl_autoload_register(function ($class) {
    $prefix  = 'App\\';            // Target root namespace prefix
    $baseDir = __DIR__ . '/../src/'; // Base directory for class source files
    $len     = strlen($prefix);

    // Verify if the requested class uses this namespace prefix
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Skip if class belongs to another namespace
    }

    // Strip namespace prefix and convert backslashes to directory separators
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    // Require the class file if it exists on disk
    if (file_exists($file)) {
        require $file;
    }
});

use App\Config\Database;
use App\Controllers\BookController;

// Initialize shared Singleton database connection object
$db = Database::getConnection();

// Instantiate the core controller, injecting the database connection
$controller = new BookController($db);

// Extract requested action route parameter from the URL GET query string (defaulting to 'index')
$action = $_GET['action'] ?? 'index';

// Simple Router Dispatcher matching the requested action to controller methods
switch ($action) {
    case 'create':
        $controller->create(); // Render book creation form
        break;
    case 'store':
        $controller->store();  // Handle submission to persist new book
        break;
    case 'index':
    default:
        $controller->index();  // Render catalog dashboard view
        break;
}