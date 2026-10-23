<?php
/**
 * Book Catalog Inventory View Template
 *
 * Displays search controls, quick actions, and tabular inventory records.
 *
 * @package App\Views\Books
 * @author Senzo Earl Maseko
 */

// Include shared header layout component
include __DIR__ . '/../layouts/header.php';
?>

<!-- Catalog Banner Header -->
<div class="p-4 mb-4 bg-white rounded-3 shadow-sm border">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1 class="display-6 fw-bold text-dark mb-1">Library Inventory Catalog</h1>
            <p class="text-muted mb-0">Browse publications, search by metadata, or manage library records.</p>
        </div>
        <div>
            <a href="index.php?action=create" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-1"></i> Add New Book
            </a>
            <a href="index.php?action=dashboard" class="btn btn-outline-dark shadow-sm ms-1">
                <i class="fa-solid fa-chart-pie me-1"></i> View Analytics
            </a>
        </div>
    </div>
</div>

<!-- Search Filtering Component -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form method="GET" action="index.php" class="row g-3">
            <div class="col-md-9">
                <input type="text" class="form-control" name="search" placeholder="Search by title, author, or genre..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
            </div>
            <div class="col-md-3 d-grid gap-2 d-flex">
                <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                <a href="index.php" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Catalog Records Table -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-list me-2 text-primary"></i>Catalog Records</h5>
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
                        <tr><td colspan="8" class="text-center py-4 text-muted">No records found matching your query.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Include shared footer layout component
include __DIR__ . '/../layouts/footer.php';
?>