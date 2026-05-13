# Mustafa Ince Portfolio

A full-stack web portfolio built for the final web programming project. The application showcases personal information, skills, GitHub projects, a downloadable CV, a contact form, and an admin dashboard for managing portfolio content.

## Project Objective

The goal of this project is to create a dynamic portfolio web application using the main technologies covered during the semester:

- HTML5
- CSS3
- JavaScript / DOM
- PHP
- MySQL
- AJAX / Fetch API
- Sessions and cookies

## Features

- Responsive single-page portfolio layout
- Dynamic project listing from a MySQL database
- AJAX project loading through `api/projects.php`
- Contact form with JavaScript validation
- Contact messages saved to the MySQL database
- Admin login with session-based authentication
- Hashed admin password verification with `password_verify()`
- Cookie-based remembered username on the admin login page
- Admin dashboard for adding, editing, and deleting projects
- Admin dashboard for viewing and deleting contact messages
- Downloadable CV
- Hidden admin shortcut: click the `[MI]` logo 5 times to open the admin login page

## Technologies Used

- Frontend: HTML5, CSS3, JavaScript
- Backend: PHP
- Database: MySQL
- Server: XAMPP / Apache
- Database access: PDO
- Version control: Git and GitHub

## Database Structure

The project uses the database defined in `database.sql`.

Main tables:

- `projects`: stores portfolio project data
- `messages`: stores contact form submissions
- `admins`: stores admin login credentials with hashed passwords

## Admin Panel

Admin login URL:

```text
http://localhost/portfolio-odev/admin/login.php
```

Default admin credentials:

```text
Username: admin
Password: admin123
```

The admin dashboard allows:

- Adding new projects
- Editing existing projects
- Deleting projects
- Viewing contact messages
- Deleting contact messages

## AJAX Usage

The project uses AJAX in two main places:

- `assets/js/script.js` submits the contact form with `fetch()` without refreshing the page.
- `assets/js/script.js` loads project data from `api/projects.php` and renders project cards dynamically.

## Session and Cookie Usage

- Sessions are used to protect the admin dashboard.
- The admin login process stores login state in `$_SESSION`.
- A cookie is used to remember the admin username when the "Remember my username" option is selected.

## Installation

1. Copy the project folder into the XAMPP `htdocs` directory:

```text
C:\xampp\htdocs\portfolio-odev
```

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Open phpMyAdmin and import:

```text
database.sql
```

4. Open the project in the browser:

```text
http://localhost/portfolio-odev/
```

5. Open the admin panel:

```text
http://localhost/portfolio-odev/admin/login.php
```

## Important Files

- `index.php`: main portfolio page
- `contact.php`: contact form backend
- `api/projects.php`: AJAX project API
- `admin/login.php`: admin login page
- `admin/dashboard.php`: admin management dashboard
- `includes/db.php`: database connection
- `assets/css/style.css`: main stylesheet
- `assets/js/script.js`: frontend interactivity and AJAX logic
- `database.sql`: database export

## GitHub Repository

```text
https://github.com/mstfnce/Mustafa-Ince-Portfolio
```

## Live Demo

Add the hosted demo link here before submission:

```text
Live Demo: 
```

## Notes

This project was developed as a full-stack portfolio web application. It is designed to satisfy the required technical project criteria while also serving as a professional portfolio asset.
