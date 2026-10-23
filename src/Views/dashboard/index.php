<?php
/**
 * Analytics Dashboard View Template
 *
 * Provides high-level operational metrics, entity breakdowns,
 * and quick-action navigation for the library system.
 *
 * @author Senzo Earl Maseko
 */

// Load layout header component
include __DIR__ . '/../layouts/header.php';
?>

<!-- Overview Header Banner -->
<div class="p-4 mb-4 bg-white rounded-3 shadow-sm border">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="display-6 fw-bold text-dark mb-1">Library System Overview</h1>
            <p class="text-muted mb-0">System performance, catalog distribution, and quick administration.</p>
        </div>
        <a href="index.php?action=create" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Add New Record
        </a>
    </div>
</div>

<!-- Primary System Metrics Row -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-primary mb-1"><i class="fa-solid fa-book"></i></div>
            <h6 class="text-muted mb-1">Total Books</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalBooks ?? 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-success mb-1"><i class="fa-solid fa-user-pen"></i></div>
            <h6 class="text-muted mb-1">Registered Authors</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalAuthors ?? 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-warning mb-1"><i class="fa-solid fa-building"></i></div>
            <h6 class="text-muted mb-1">Publishers</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalPublishers ?? 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-info mb-1"><i class="fa-solid fa-tags"></i></div>
            <h6 class="text-muted mb-1">Genres</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalGenres ?? 0; ?></h2>
        </div>
    </div>
</div>

<!-- Detailed Entity Quick Links -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3">
                <i class="fa-solid fa-layer-group text-primary me-2"></i>Catalog Quick Navigation
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Jump directly into catalog operations or search for specific publications.</p>
                <div class="d-grid gap-2">
                    <a href="index.php" class="btn btn-outline-dark text-start">
                        <i class="fa-solid fa-list me-2"></i> View Full Inventory Catalog
                    </a>
                    <a href="index.php?action=create" class="btn btn-outline-primary text-start">
                        <i class="fa-solid fa-circle-plus me-2"></i> Insert New Book Record
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3">
                <i class="fa-solid fa-circle-info text-primary me-2"></i>System Technical Info
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span>Architecture Pattern</span>
                        <span class="badge bg-dark">Modular MVC</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span>Database Engine</span>
                        <span class="badge bg-secondary">MariaDB (InnoDB)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span>Security Standard</span>
                        <span class="badge bg-success">PDO Prepared Statements</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span>Lead Developer</span>
                        <span class="fw-semibold