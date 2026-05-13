<?php
$host = 'localhost';
$dbName = 'portfolio_db';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
