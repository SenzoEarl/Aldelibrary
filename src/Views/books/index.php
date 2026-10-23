<?php
/**
 * Book Catalog / Dashboard View Template
 *
 * Renders statistical cards, search filters, and tabular display of book records.
 *
 * @author Senzo Earl Maseko
 */

// Load shared header layout component
include __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Banner Header -->
<div class="p-4 mb-4 bg-white rounded-3 shadow-sm border">
    <h1 class="display-6 fw-bold text-dark">Library Inventory Dashboard</h1>
    <p class="text-muted mb-0">Manage catalog records, track publishers, and filter literary assets seamlessly.</p>
</div>

<!-- Dashboard Metric Cards Row -->
<div class="row g-3 mb-4">
    <!-- Card 1: Total Books Count -->
    <div class="col-md-4">
        <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center">
            <div class="fs-1 text-primary me-3"><i class="fa-solid fa-book"></i></div>
            <div>
                <h6 class="text-muted mb-1">Total Books</h6>
                <h3 class="fw-bold mb-0"><?php echo $totalBooks ?? '-\0/-'; // Display total calculated book count ?></h3>
            </div>
        </div>
    </div>
    <!-- Card 2: Registered Authors Count -->
    <div class="col-md-4">
        <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center">
            <div class="fs-1 text-success me-3"><i class="fa-solid fa-user-pen"></i></div>
            <div>
                <h6 class="text-muted mb-1">Authors</h6>
                <h3 class="fw-bold mb-0"><?php echo $totalAuthors ?? 0; // Display total author count ?></h3>
            </div>
        </div>
    </div>
    <!-- Card 3: Publishers Count -->
    <div class="col-md-4">
        <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center">
            <div class="fs-1 text-warning me-3"><i class="fa-solid fa-building"></i></div>
            <div>
                <h6 class="text-muted mb-1">Publishers</h6>
                <h3 class="fw-bold mb-0"><?php echo $totalPublishers ?? 0; // Display publisher count ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Search Filtering Component -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form method="GET" action="index.php" class="row g-3">
            <div class="col-md-9">
                <!-- Search Keyword Input Field -->
                <input type="text" class="form-control" name="search" placeholder="Search by title, author, or genre..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
            </div>
            <div class="col-md-3 d-grid gap-2 d-flex">
                <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                <a href="index.php" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Book Catalog Table -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-list me-2 text-primary"></i>Catalog Inventory</h5>
        <a href="index.php?action=create" class="btn btn-sm btn-dark"><i class="fa-solid fa-plus me-1"></i> Add Book</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Publisher</th>
                        <th>Language</th>
                        <th>Country</th>
                        <th class="text-end pe-3">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($books) > 0): ?>
                        <!-- Loop through and display each book record -->
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td class="ps-3 text-muted">#<?php echo $book['book_id']; ?></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($book['book_name']); ?></td>
                                <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($book['author_name']); ?></span></td>
                                <td><?php echo htmlspecialchars($book['genre_name']); ?></td>
                                <td><?php echo htmlspecialchars($book['publisher_name']); ?></td>
                                <td><?php echo htmlspecialchars($book['language_name']); ?></td>
                                <td><?php echo htmlspecialchars($book['country_name']); ?></td>
                                <td class="text-end pe-3 text-success fw-semibold">$<?php echo number_format($book['price'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Render empty state fallback message if no records match -->
                        <tr><td colspan="8" class="text-center py-4 text-muted">No records found matching your query.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Load shared footer layout component
include __DIR__ . '/../layouts/footer.php';
?>