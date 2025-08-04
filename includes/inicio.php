<?php 
require_once('../config/database.php');

$db = new Database();
$con = $db->conectar();
session_start();
if(isset ($_POST["inicio"]))
{
    
    $usuario = $_POST["documento"];
	$clave = $_POST["contrasena"];
    $name = $_POST["nombre"];
    if ($usuario=="" || $clave=="")
    {
        echo"<script>alert('Datos Vacios')</script>";
	    echo"<script>window.location='../login.php'</script>";
    }
    else
    {
        $sql = $con->prepare("SELECT * FROM estudiante WHERE documento = '$usuario' AND contrasena = '$clave' ");
        $sql->execute();
        $fila = $sql->fetch();
        
        if ($fila['documento']) {
            $_SESSION['documento'] = $fila['documento'];
            $_SESSION['contrasena'] = $fila['contrasena'];
            $_SESSION['nombre'] = $fila['nombre'];
            if ($_SESSION['contrasena']) {
                header("Location: estudiante.php");
                exit();
            }
           
        }
        else
        {
            echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
            echo"<script>window.location='../index.php'</script>";
            exit();
        }
}
}
?>