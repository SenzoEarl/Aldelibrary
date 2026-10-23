-- 🔄 Enable foreign key constraints
PRAGMA foreign_keys = ON;

-- 🌍 Insert Countries
INSERT INTO Country (name) VALUES
('India'),
('USA'),
('UK');

-- 🌐 Insert Languages
INSERT INTO Language (name) VALUES
('English'),
('Telugu'),
('Hindi');

-- 🎭 Insert Genres
INSERT INTO Genre (name) VALUES
('Fiction'),
('Science'),
('History'),
('Biography');

-- 🏢 Insert Publishers
INSERT INTO Publisher (name, country_id) VALUES
('Penguin Books', 3),
('HarperCollins', 2),
('Rupa Publications', 1);

-- 👤 Insert Authors
INSERT INTO Author (name, email_id, linkedin_url) VALUES
('Arundhati Roy', 'aroy@example.com', 'https://linkedin.com/in/aroy'),
('George Orwell', 'gorwell@example.com', 'https://linkedin.com/in/gorwell'),
('Stephen Hawking', 'shawking@example.com', 'https://linkedin.com/in/shawking');

-- 📘 Insert Books
INSERT INTO Books (name, price, author_id, language_id, genre_id, publisher_id, country_id) VALUES
('The God of Small Things', 350.00, 1, 1, 1, 3, 1),
('1984', 450.00, 2, 1, 1, 1, 3),
('A Brief History of Time', 500.00, 3, 1, 2, 2, 2),
('Telugu Short Stories', 200.00, 1, 2, 1, 3, 1),
('Freedom at Midnight', 300.00, 2, 1, 3, 2, 3);
