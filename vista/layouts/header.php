<?php
$activo = 'mantenedor';
if(isset($_GET['m'])){
    if($_GET['m']=='login'){
        $activo = 'login';
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenedor de usuarios</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">

</head>
<body>
   
       
       
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Prueba técnica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link <?php if($activo=='mantenedor') echo 'active'?>" aria-current="page" href="index.php">Mantenedor</a>
                    </li>
                    <li class="nav-item">                        
                    <a class="nav-link <?php if($activo=='login') echo 'active'?>" href="index.php?m=login">Log in</a>
                    </li>                    
                </ul>                
                </div>
            </div>
            </nav>
        <div class="container-fluid">
       
       <!-- contenido-->
