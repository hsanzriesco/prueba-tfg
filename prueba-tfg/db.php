<?php
$host = 'ep-tiny-bread-ad6ng4xc-pooler.c-2.us-east-1.aws.neon.tech';
$db = 'neon_db';
$user = 'neondb_owner';
$pass = 'npg_YhqK5zjga2dc';
$port = 5432;

$dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die(json_encode(['message' => 'Error al conectar a Neon: ' . $e->getMessage()]));
}
?>
