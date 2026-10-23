<?php
/**
 * Create Book View Component
 *
 * Renders an interactive form to register a new book record in the catalog.
 * Dynamically populates selection dropdowns for relational entities (Author,
 * Genre, Publisher, Language, Country) and enforces client-side validation.
 *
 * @package App\Views\Books
 * @author Senzo Earl Maseko
 * @version 1.0.0
 */

// Load the shared HTML header layout component
include __DIR__ . '/../layouts/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <!-- Card Header -->
            <div class="card-header bg-dark text-white py-3">
                <h4 class="mb-0">
                    <i class="fa-solid fa-circle-plus me-2 text-warning"></i>Add New Book Record
                </h4>
            </div>

            <!-- Card Body / Form Container -->
            <div class="card-body p-4">

                <!-- Display error alert if redirect status indicates validation/persistence failure -->
                <?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        Please fill in all mandatory fields (Title, Author, Genre, Price) with valid values.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- New Book Creation Form -->
                <form action="index.php?action=store" method="POST" id="bookForm" novalidate>

                    <!-- Book Title Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Book Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="e.g. A Brief History of Time">
                        <div class="invalid-feedback">Please provide a valid book title.</div>
                    </div>

                    <!-- Author and Genre Selection Row -->
                    <div class="row">
                        <!-- Author Selection Dropdown -->
                        <div class="col-md-6 mb-3">
                            <label for="author_id" class="form-label fw-semibold">Author <span class="text-danger">*</span></label>
                            <select class="form-select" id="author_id" name="author_id" required>
                                <option value="">Select Author...</option>
                                <?php if (!empty($authors) && is_array($authors)): ?>
                                    <?php foreach ($authors as $author): ?>
                                        <option value="<?php echo htmlspecialchars($author['author_id']); ?>">
                                            <?php echo htmlspecialchars($author['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">Please select an author.</div>
                        </div>

                        <!-- Genre Selection Dropdown -->
                        <div class="col-md-6 mb-3">
                            <label for="genre_id" class="form-label fw-semibold">Genre <span class="text-danger">*</span></label>
                            <select class="form-select" id="genre_id" name="genre_id" required>
                                <option value="">Select Genre...</option>
                                <?php if (!empty($genres) && is_array($genres)): ?>
                                    <?php foreach ($genres as $genre): ?>
                                        <option value="<?php echo htmlspecialchars($genre['genre_id']); ?>">
                                            <?php echo htmlspecialchars($genre['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">Please select a genre.</div>
                        </div>
                    </div>

                    <!-- Publisher and Language Selection Row -->
                    <div class="row">
                        <!-- Publisher Selection Dropdown -->
                        <div class="col-md-6 mb-3">
                            <label for="publisher_id" class="form-label fw-semibold">Publisher</label>
                            <select class="form-select" id="publisher_id" name="publisher_id">
                                <option value="">Select Publisher...</option>
                                <?php if (!empty($publishers) && is_array($publishers)): ?>
                                    <?php foreach ($publishers as $publisher): ?>
                                        <option value="<?php echo htmlspecialchars($publisher['publisher_id']); ?>">
                                            <?php echo htmlspecialchars($publisher['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Language Selection Dropdown -->
                        <div class="col-md-6 mb-3">
                            <label for="language_id" class="form-label fw-semibold">Language</label>
                            <select class="form-select" id="language_id" name="language_id">
                                <option value="">Select Language...</option>
                                <?php if (!empty($languages) && is_array($languages)): ?>
                                    <?php foreach ($languages as $language): ?>
                                        <option value="<?php echo htmlspecialchars($language['language_id']); ?>">
                                            <?php echo htmlspecialchars($language['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Country and Price Input Row -->
                    <div class="row">
                        <!-- Country Selection Dropdown -->
                        <div class="col-md-6 mb-3">
                            <label for="country_id" class="form-label fw-semibold">Country</label>
                            <select class="form-select" id="country_id" name="country_id">
                                <option value="">Select Country...</option>
                                <?php if (!empty($countries) && is_array($countries)): ?>
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo htmlspecialchars($country['country_id']); ?>">
                                            <?php echo htmlspecialchars($country['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Retail Price Input -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-semibold">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0.01" class="form-control" id="price" name="price" required placeholder="0.00">
                            <div class="invalid-feedback">Please enter a valid price greater than zero.</div>
                        </div>
                    </div>

                    <!-- Form Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="index.php" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back to Catalog
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save Book Record
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Load the shared HTML footer layout component
include __DIR__ . '/../layouts/footer.php';
?>