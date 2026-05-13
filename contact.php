<?php
header('Content-Type: application/json; charset=utf-8');

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $subject === '' || $message === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Lutfen tum alanlari doldurun.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Gecerli bir e-posta adresi girin.']);
    exit;
}

require __DIR__ . '/includes/db.php';

$stmt = $pdo->prepare(
    'INSERT INTO messages (name, email, subject, message, created_at)
     VALUES (?, ?, ?, ?, NOW())'
);

$stmt->execute([$name, $email, $subject, $message]);

echo json_encode(['success' => true, 'message' => 'Mesajiniz basariyla kaydedildi.']);
