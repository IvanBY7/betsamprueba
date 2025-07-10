<?php
// Cabecera para permitir peticiones desde cualquier origen (CORS, opcional)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Incluir conexión
require_once 'config.php';

try {
    // Consulta a la tabla mensajes
    $stmt = $pdo->query("SELECT id, nombre, mensaje FROM mensajes ORDER BY id DESC");
    $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar respuesta JSON
    echo json_encode([
        'success' => true,
        'data' => $mensajes
    ]);
} catch (PDOException $e) {
    // En caso de error, devolver mensaje de error
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
