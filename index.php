<?php
session_start();
include 'index.view.php';

$host = 'localhost';
$dbname = 'gestion_usuarios';
$username = 'root';
$password = "";

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL
    )");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        
        if (!empty($nombre) && !empty($email)) {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

    $stmt = $pdo->query("SELECT * FROM usuarios");
    $_SESSION['usuarios'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


?>
