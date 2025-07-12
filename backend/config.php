<?php
// Cabeceras para permitir CORS (opcional, solo si accedes por navegador)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Datos de conexión (ajusta si es necesario)
$host = 'localhost';
$dbname = 'ambeto_db';
$user = 'bambi';
$password = '1234';

try {
    // Intentar la conexión
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "¡Conexión exitosa a la base de datos '$dbname'!";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>

