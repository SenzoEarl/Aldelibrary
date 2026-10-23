-- 📚 SQLite Schema for Library Database

-- 🌍 Country Table
CREATE TABLE IF NOT EXISTS Country (
    country_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL
);

-- 🌐 Language Table
CREATE TABLE IF NOT EXISTS Language (
    language_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL
);

-- 🎭 Genre Table
CREATE TABLE IF NOT EXISTS Genre (
    genre_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL
);

-- 🏢 Publisher Table
CREATE TABLE IF NOT EXISTS Publisher (
    publisher_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    country_id INTEGER,
    FOREIGN KEY (country_id) REFERENCES Country(country_id)
);

-- 👤 Author Table
CREATE TABLE IF NOT EXISTS Author (
    author_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    email_id TEXT,
    linkedin_url TEXT
);

-- 📘 Books Table
CREATE TABLE IF NOT EXISTS Books (
    book_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    price REAL,
    author_id INTEGER,
    language_id INTEGER,
    genre_id INTEGER,
    publisher_id INTEGER,
    country_id INTEGER,
    FOREIGN KEY (author_id) REFERENCES Author(author_id),
    FOREIGN KEY (language_id) REFERENCES Language(language_id),
    FOREIGN KEY (genre_id) REFERENCES Genre(genre_id),
    FOREIGN KEY (publisher_id) REFERENCES Publisher(publisher_id),
    FOREIGN KEY (country_id) REFERENCES Country(country_id)
);

