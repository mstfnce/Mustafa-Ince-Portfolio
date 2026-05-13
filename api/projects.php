<?php
header('Content-Type: application/json; charset=utf-8');

try {
    require __DIR__ . '/../includes/db.php';

    $stmt = $pdo->query(
        'SELECT id, title, description, tech, tech_class, tag, project_url, is_featured, sort_order
         FROM projects
         ORDER BY sort_order ASC, id ASC'
    );

    echo json_encode([
        'success' => true,
        'projects' => $stmt->fetchAll(),
    ]);
} catch (Throwable $error) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while loading projects.',
    ]);
}
