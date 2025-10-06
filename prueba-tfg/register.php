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

// Verifica si el usuario ya existe
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);

if ($stmt->fetch()) {
    echo json_encode(['message' => 'El usuario ya existe']);
    exit;
}

// Inserta usuario
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

echo json_encode(['message' => 'Usuario registrado con éxito']);
?>
