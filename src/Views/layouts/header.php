<?php
/**
 * Header Template Component
 *
 * Provides global HTML head tags, Bootstrap 5 CDN stylesheets, FontAwesome,
 * and responsive navigation menu headers.
 *
 * @package App\Views\Layouts
 * @author Senzo Earl Maseko
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aldelibrary - Professional Library Management</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome UI Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Application Custom Stylesheet -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navigation Header Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fa-solid fa-book-bookmark text-warning me-2"></i>Aldelibrary
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav ms-auto">
                    <!-- Dashboard / Stats Link -->
                    <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] === 'dashboard') ? 'active' : ''; ?>" href="index.php?action=dashboard">
                        <i class="fa-solid fa-chart-pie me-1"></i> Dashboard
                    </a>
                    <!-- Catalog Link -->
                    <a class="nav-link <?php echo (!isset($_GET['action']) || $_GET['action'] === 'index') ? 'active' : ''; ?>" href="index.php">
                        <i class="fa-solid fa-list me-1"></i> Catalog
                    </a>
                    <!-- Add Book Link -->
                    <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] === 'create') ? 'active' : ''; ?>" href="index.php?action=create">
                        <i class="fa-solid fa-plus-circle me-1"></i> Add Book
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main View Content Area -->
    <main class="container my-4 flex-grow-1">