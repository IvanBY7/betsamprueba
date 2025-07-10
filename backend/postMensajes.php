<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Permitir solo solicitudes POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'error' => 'Método no permitido. Usa POST.'
    ]);
    exit;
}

require_once 'config.php';

// Obtener y sanitizar los datos de entrada
$nombre = $_POST['nombre'] ?? null;
$mensaje = $_POST['mensaje'] ?? null;

if (!$nombre || !$mensaje) {
    echo json_encode([
        'success' => false,
        'error' => 'Faltan campos requeridos: nombre y mensaje.'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO mensajes (nombre, mensaje) VALUES (:nombre, :mensaje)");
    $stmt->execute([
        ':nombre' => $nombre,
        ':mensaje' => $mensaje
    ]);

    echo json_encode([
        'success' => true,
        'message' => 'Mensaje registrado exitosamente.'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
