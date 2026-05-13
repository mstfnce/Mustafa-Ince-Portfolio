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

INSERT INTO projects (title, description, tech, tech_class, tag, is_featured, sort_order) VALUES
('Weather-Sphere', 'Real-time weather application using React.js and OpenWeather API with dynamic UI.', 'React', 'react-dot', 'Featured', 1, 1),
('Cyber-Store', 'Full-scale E-Commerce platform built with .NET and SQL Server backend.', '.NET', 'dotnet-dot', 'Featured', 1, 2),
('Task-Tracker-App', 'Mobile application for daily task management built with Java.', 'Java', 'java-dot', 'Public', 0, 3),
('CashFlow-App', 'Finance management mobile app focused on expense tracking.', 'Java', 'java-dot', 'Public', 0, 4),
('blog-site', 'Modern dark-themed blog layout with Bootstrap 5 and responsive design.', 'HTML', 'html-dot', 'Public', 0, 5),
('Quiz-App', 'Interactive Quiz App with timer, progress bars, and score validation.', 'JS', 'js-dot', 'Public', 0, 6);
