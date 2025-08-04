<?php
require_once('../config/database.php');

$db = new Database();
$con = $db->conectar();
session_start();
$documento = $_SESSION['documento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido señ@r con documento <?php echo $documento; ?></h1>
</body>
</html>