<?php

$host = 'localhost';       // o IP del servidor
$db   = 'bambi';           // nombre de tu base de datos
$user = 'bambi';           // tu usuario de PostgreSQL
$pass = 'bambi';           // la contraseña del usuario
$port = '5432';            // puerto por defecto de PostgreSQL

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    // Configurar para lanzar excepciones en errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "✅ Conexión exitosa a PostgreSQL";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>