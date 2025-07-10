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
    if (
        empty($input['nombre_familia']) ||
        !isset($input['personas_permitidas']) ||
        !isset($input['participa_foto']) ||
        empty($input['numero_telefonico'])
    ) {
        echo json_encode([
            'success' => false,
            'error' => 'Faltan campos obligatorios.'
        ]);
        exit;
    }

    // Insertar invitado
    $stmt = $pdo->prepare("INSERT INTO invitados 
        (nombre_familia, personas_permitidas, participa_foto, numero_telefonico)
        VALUES (:nombre_familia, :personas_permitidas, :participa_foto, :numero_telefonico)");

    $stmt->bindParam(':nombre_familia', $input['nombre_familia']);
    $stmt->bindParam(':personas_permitidas', $input['personas_permitidas'], PDO::PARAM_INT);
    $stmt->bindParam(':participa_foto', $input['participa_foto'], PDO::PARAM_BOOL);
    $stmt->bindParam(':numero_telefonico', $input['numero_telefonico']);

    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Invitado insertado correctamente.'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
