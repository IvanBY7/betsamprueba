<?php
// Cabeceras para permitir CORS (si accedes desde móviles, necesarias)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Incluir conexión
require_once 'config.php';

try {
    // Permitir solo solicitudes POST
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        echo json_encode([
            'success' => false,
            'error' => 'Método no permitido. Usa POST.'
        ]);
        exit;
    }
    // Consulta segura usando prepare + bindParam
    $stmt = $pdo->prepare("SELECT id, nombre_familia, personas_permitidas, confirmacion_asistencia, participa_foto, numero_telefonico FROM invitados");
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $resultados
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
