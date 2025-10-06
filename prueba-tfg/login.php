<?php
header('Content-Type: application/json');
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (!$username || !$password) {
    echo json_encode(['message' => 'Faltan datos']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->execute([$username, $password]);

$user = $stmt->fetch();

if ($user) {
    echo json_encode(['message' => 'Inicio de sesión exitoso']);
} else {
    echo json_encode(['message' => 'Credenciales incorrectas']);
}
?>
