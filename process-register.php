<?php
header('Content-Type: application/json');
require_once 'config/db.php';   // ← nové připojení

$data = json_decode(file_get_contents('php://input'), true);
$username = trim($data['username'] ?? '');
$password = $data['password'] ?? '';

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Vyplň všechna pole']);
    exit;
}

if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
    echo json_encode(['success' => false, 'message' => 'Username smí obsahovat jen písmena a čísla']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Heslo musí mít minimálně 6 znaků']);
    exit;
}

// Kontrola duplicity
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Toto uživatelské jméno je již zabrané']);
    exit;
}

// Uložení uživatele
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
if ($stmt->execute([$username, $hash])) {
    echo json_encode(['success' => true, 'message' => 'Registrace úspěšná! Přihlaš se.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Chyba při registraci']);
}
?>