
<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('Location: ../index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="../Lib/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="../secciones/index.php" aria-current="page">Inicio</a>
                <a class="nav-item nav-link" href="vista_asociados.php">Asociados</a>
                <a class="nav-item nav-link" href="cerrar.php">Cerrar sesion</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <br />
        <div class="row">
            <div class="col-12">
                <div class="row">