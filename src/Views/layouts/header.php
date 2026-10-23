<?php
/**
 * Layout Header Component
 *
 * Provides the global HTML document structure, CSS stylesheet links,
 * and main navigation menu header.
 *
 * @author Senzo Earl Maseko
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aldelibrary - Professional Library Management</title>
    <!-- Load Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load FontAwesome Icon Kit -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <!-- Main Top Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fa-solid fa-book-bookmark text-warning me-2"></i>Aldelibrary
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="index.php"><i class="fa-solid fa-house me-1"></i> Dashboard</a>
                <a class="nav-link" href="index.php?action=create"><i class="fa-solid fa-plus-circle me-1"></i> Add Book</a>
            </div>
        </div>
    </nav>
    <!-- Start Main Container -->
    <main class="container my-4 flex-grow-1">