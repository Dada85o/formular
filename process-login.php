<?php
session_start();
header('Content-Type: application/json');
require_once 'config/db.php';   // ← používáme společné připojení

$data = json_decode(file_get_contents('php://input'), true);
$username = trim($data['username'] ?? '');
$password = $data['password'] ?? '';

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Vyplň všechna pole']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo json_encode(['success' => true, 'message' => 'Přihlášení úspěšné! Vítej, ' . $user['username'] . '!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Špatné uživatelské jméno nebo heslo']);
}
?>