# Aldelibrary - Library Management System

A professional, enterprise-ready web application built using standard **PHP (OOP/MVC)**, **MariaDB**, **Bootstrap 5**, and **JavaScript**.

## Key Technical Features
* **Modular MVC Architecture:** Strict separation of routing (`public/index.php`), logic (`src/Controllers`), database queries (`src/Models`), and templated presentation (`src/Views`).
* **Database Security:** PDO prepared statements with parameter binding to prevent SQL injection vulnerabilities.
* **MariaDB Relational Integrity:** Enforces foreign key relationships (`InnoDB` engine) between `Books`, `Author`, `Publisher`, `Genre`, `Language`, and `Country` tables.
* **Bootstrap 5 UI:** Responsive layout with custom validation states, dynamic metrics cards, and search filtering.

## Setup Instructions
1. Import `database/schema.sql` into your MariaDB server (e.g., via phpMyAdmin or MySQL CLI) under a database named `a_library`.
2. Import `database/seed.sql` to populate initial records.
3. Configure database credentials in `src/config/Database.php` if required.
4. Point your local web server document root to the `public/` directory (e.g., `http://localhost/Aldelibrary/public/`).

## Author
**Senzo Earl Maseko**