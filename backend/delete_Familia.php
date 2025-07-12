<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

require_once 'config.php';

try {
    // Obtener los datos del cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['id'])) {
        throw new Exception("Falta el parámetro 'id'.");
    }

    $stmt = $pdo->prepare("DELETE FROM invitados WHERE id = :id_familia");
    $stmt->bindParam(':id_familia', $input['id'], PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Invitado eliminado correctamente'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
