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
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            'success' => false,
            'error' => 'Método no permitido. Usa POST.'
        ]);
        exit;
    }
    $id_familia = $_POST['id_familia'] ?? null;

    if (!$id_familia) {
        echo json_encode([
            'success' => false,
            'error' => 'No se detectó ninguna familia registrada'
        ]);
        exit;
    }

    // Consulta segura usando prepare + bindParam
    $stmt = $pdo->prepare("SELECT nombre_familia, personas_permitidas, confirmacion_asistencia, participa_foto, numero_telefonico FROM invitados WHERE id = :id_familia");
    $stmt->bindParam(':id_familia', $id_familia, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $resultado
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
