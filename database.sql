CREATE DATABASE IF NOT EXISTS portfolio_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio_db;

CREATE TABLE IF NOT EXISTS projects (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  tech VARCHAR(60) NOT NULL,
  tech_class VARCHAR(60) NOT NULL DEFAULT 'js-dot',
  tag VARCHAR(60) NOT NULL DEFAULT 'Public',
  project_url VARCHAR(255) DEFAULT NULL,
  is_featured TINYINT(1) NOT NULL DEFAULT 0,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS messages (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  subject VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(80) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password_hash) VALUES
('admin', '$2y$10$zWw5nUMK.G2nb1dQZhqcZeQca.v1fMwHDeO.uFj58OCHBjOBlhbBm')
ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash);

INSERT INTO projects (title, description, tech, tech_class, tag, project_url, is_featured, sort_order) VALUES
('Mustafa Ince Portfolio', 'Full-stack web portfolio with PHP, MySQL, AJAX contact form, secure admin login, sessions, cookies, and database-driven project management.', 'PHP/MySQL', 'php-dot', 'Featured', 'https://github.com/mstfnce/Mustafa-Ince-Portfolio', 1, 1),
('Dotnet Store', 'ASP.NET Core MVC e-commerce project with product, category, user management, cart, and order features.', '.NET', 'dotnet-dot', 'Featured', 'https://github.com/mstfnce/Dotnet-Store', 1, 2),
('MovieApp', 'React and Vite movie discovery app using the TMDB API with search, movie details, theme switching, and watchlist features.', 'React', 'react-dot', 'Featured', 'https://github.com/mstfnce/MovieApp', 1, 3),
('Weather App', 'Responsive React weather app showing current weather, hourly forecast, 5-day forecast, and sunrise/sunset times using OpenWeather API.', 'React', 'react-dot', 'Public', 'https://github.com/mstfnce/Weather-App', 0, 4),
('Task Tracker App', 'Android app for creating goals and tracking daily progress with task editing, filtering, and progress visualization.', 'Java', 'java-dot', 'Public', 'https://github.com/mstfnce/Task-Tracker-App', 0, 5),
('CashFlow App', 'Java Android finance management app for tracking income, expenses, categories, and daily/weekly/monthly summaries.', 'Java', 'java-dot', 'Public', 'https://github.com/mstfnce/CashFlow-App', 0, 6),
('Quiz App', 'Interactive JavaScript quiz application with timer, progress tracking, answer validation, and score calculation.', 'JS', 'js-dot', 'Public', 'https://github.com/mstfnce/Quiz-App', 0, 7),
('Blog Site', 'Modern dark-themed Bootstrap 5 blog layout with responsive navbar, hero section, blog cards, categories, and trending topics.', 'Bootstrap', 'html-dot', 'Public', 'https://github.com/mstfnce/blog-site', 0, 8);
