<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Permitir preflight (CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once 'config.php';

try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            'success' => false,
            'error' => 'Método no permitido. Usa POST.'
        ]);
        exit;
    }

    // Obtener datos del cuerpo de la petición (JSON)
    $input = json_decode(file_get_contents('php://input'), true);

    // Validar campos requeridos
    if (empty($input['id_familia'])) {
        echo json_encode([
            'success' => false,
            'error' => 'Falta el campo id_familia.'
        ]);
        exit;
    }

    // Actualizar confirmación de asistencia en la tabla invitados
    $stmt = $pdo->prepare("UPDATE invitados 
        SET confirmacion_asistencia = true 
        WHERE id = :id_familia");

    $stmt->bindParam(':id_familia', $input['id_familia'], PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'success' => true,
            'message' => 'Confirmación actualizada correctamente.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'No se encontró un registro con ese ID o ya estaba confirmado.'
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
