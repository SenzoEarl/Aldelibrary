<?php
/**
 * System Analytics & Statistics View
 *
 * Houses dynamic metric indicators and system architecture information.
 *
 * @package App\Views\Dashboard
 * @author Senzo Earl Maseko
 */

// Include shared header layout component
include __DIR__ . '/../layouts/header.php';
?>

<!-- Analytics Header Banner -->
<div class="p-4 mb-4 bg-white rounded-3 shadow-sm border">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1 class="display-6 fw-bold text-dark mb-1"><i class="fa-solid fa-chart-pie text-primary me-2"></i>System Analytics & Statistics</h1>
            <p class="text-muted mb-0">Real-time catalog indicators, publishing counts, and system specs.</p>
        </div>
        <div>
            <a href="index.php" class="btn btn-outline-secondary shadow-sm">
                <i class="fa-solid fa-list me-1"></i> Back to Catalog
            </a>
        </div>
    </div>
</div>

<!-- Primary Metric Stat Cards Row -->
<div class="row g-3 mb-4">
    <!-- Total Books Stat Card -->
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-primary mb-1"><i class="fa-solid fa-book"></i></div>
            <h6 class="text-muted mb-1">Total Publications</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalBooks ?? 0; ?></h2>
        </div>
    </div>

    <!-- Registered Authors Stat Card -->
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-success mb-1"><i class="fa-solid fa-user-pen"></i></div>
            <h6 class="text-muted mb-1">Registered Authors</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalAuthors ?? 0; ?></h2>
        </div>
    </div>

    <!-- Active Publishers Stat Card -->
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-warning mb-1"><i class="fa-solid fa-building"></i></div>
            <h6 class="text-muted mb-1">Publishing Houses</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalPublishers ?? 0; ?></h2>
        </div>
    </div>

    <!-- Total Genres Stat Card -->
    <div class="col-md-3">
        <div class="p-3 bg-white border rounded-3 shadow-sm text-center">
            <div class="fs-1 text-info mb-1"><i class="fa-solid fa-tags"></i></div>
            <h6 class="text-muted mb-1">Literary Genres</h6>
            <h2 class="fw-bold mb-0 text-dark"><?php echo $totalGenres ?? 0; ?></h2>
        </div>
    </div>
</div>

<!-- Administrative Info Section -->
<div class="row g-4">
    <!-- Navigation Options -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold py-3 border-bottom">
                <i class="fa-solid fa-layer-group text-primary me-2"></i>Inventory Operations
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <p class="text-muted small">Manage book records or query catalog parameters via the database.</p>
                <div class="d-grid gap-2">
                    <a href="index.php" class="btn btn-outline-dark text-start">
                        <i class="fa-solid fa-list me-2 text-primary"></i> Open Inventory Catalog
                    </a>
                    <a href="index.php?action=create" class="btn btn-outline-primary text-start">
                        <i class="fa-solid fa-circle-plus me-2 text-success"></i> Register New Book Record
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Architecture Specifications -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold py-3 border-bottom">
                <i class="fa-solid fa-microchip text-primary me-2"></i>System Architecture Specifications
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span class="text-muted">Software Pattern</span>
                        <span class="badge bg-dark">Modular MVC</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span class="text-muted">Database Engine</span>
                        <span class="badge bg-secondary">MariaDB (InnoDB Engine)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span class="text-muted">Security Standard</span>
                        <span class="badge bg-success">PDO Prepared Statements</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ps-0 pe-0">
                        <span class="text-muted">Lead Developer</span>
                        <span class="fw-bold text-dark">Senzo Earl Maseko</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
// Include shared footer layout component
include __DIR__ . '/../layouts/footer.php';
?>