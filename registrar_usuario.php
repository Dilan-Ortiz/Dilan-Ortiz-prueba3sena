<?php

session_start();
require_once("config/database.php");
$db = new Database();
$con = $db->conectar();

if (isset($_POST['saved'])) {

    $doc = $_POST['documento'];
    $name = $_POST['nombre'];
    $email = $_POST['email']; 
    $contrasena = $_POST['contrasena'];

    $sql =$con->prepare(query:"SELECT * FROM estudiante WHERE documento = '$doc'");
    $sql->execute();
    $fila =$sql->fetchAll(mode: PDO::FETCH_ASSOC);

    if ($fila)
    {
        echo '<script>alert ("Documento o usuario existente// Ingrese otros datos");</script>';
    }

    elseif ($doc=="" || $name=="" || $email=="" || $contrasena=="")
        {
            echo '<script>alert ("Existen campos vacios");</script>';
            echo '<script>window.location="index.php"</script>';
        }

    else
    {
        $insertSQL = $con->prepare(query:"INSERT INTO `estudiante` (`documento`, `nombre`, `email`, `contrasena`) VALUES ('$doc', '$name', '$email', '$contrasena')");
        $insertSQL->execute();
        echo '<script>alert (" Registro existoso ");</script>';
        echo '<script>window.location ="index.php"</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inicio de sesion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/LOGO.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.html" class="navbar-brand ps-5 me-0">
        <img src="img/logo3.png">
        </a>

       
    </nav>
    <!-- Navbar End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container-fluid" style="border-top: 1px solid #E1E1E1; padding: 20px; ">
            <div class="row gy-5 gx-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                    <!-- LIBRE -->
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container" align="center">
        <fieldset class="mb-4">
            <legend><i class="fas fa-user" ></i> &nbsp; REGISTRO DE SESION</legend>
                <form role="form" class="form-horizontal" method="post" name="form1" id="form1" action="" autocomplete="off">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="col-12 col-md-9">
                            <div class="form-outline mb-4">
                                <div class="mb-4">
                                    <div class="form-outline mb-4">
                                        <label for="documento" class="nav-link"> &nbsp;<strong>DOCUMENTO </strong></label>
                                            <input type="text" id="usuario" class="form-control Input" name="documento" maxlength="15" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="col-12 col-md-9">
                            <div class="form-outline mb-4">
                                <div class="mb-4">
                                    <div class="form-outline mb-4">
                                        <label for="name" class="nav-link"> &nbsp;<strong>NOMBRE </strong></label>
                                            <input type="text" id="name" class="form-control Input" name="nombre" maxlength="80" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="col-12 col-md-9">
                            <div class="form-outline mb-4">
                                <div class="mb-4">
                                    <div class="form-outline mb-4">
                                        <label for="email" class="nav-link"> &nbsp;<strong>EMAIL </strong></label>
                                            <input type="email" id="email" class="form-control Input" name="email" maxlength="100" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="col-12 col-md-9">
                            <div class="form-outline mb-4">
                                <div class="mb-4">
                                    <div class="form-outline mb-4">
                                        <label for="contrasena" class="nav-link"> &nbsp;<strong>CONTRASEÑA </strong></label>
                                        <input type="password" id="contrasena" class="form-control Input" name="contrasena" maxlength="12" required>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info center-block" name="saved" value="">GUARDAR</button>
                    </div><br>
                </form>
            </fieldset>
    </div>

    

    


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>