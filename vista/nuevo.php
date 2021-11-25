<?php
require_once("layouts/header.php");
?>
<div class="row justify-content-center bg-dark">
    <h1 class="text-white text-center">Nuevo usuario</h1>
    <form action="" method="get" class="form col-6" onsubmit="validarForm(event,'new')">
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
            <input class="form-control" id="txtNombre" type="text" placeholder="INGRESE NOMBRE:" name="nombre" aria-label="nombre" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
            <input class="form-control" id="txtApellido" type="text" placeholder="INGRESE APELLIDO:" name="apellido" aria-label="apellido" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
            <input class="form-control" id="txtEmail" type="email" placeholder="INGRESE EMAIL:" name="email" aria-label="email" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
            <input class="form-control" id="txtNacimiento" type="date" placeholder="INGRESE FECHA DE NACIMIENTO:" name="nacimiento" aria-label="nacimiento" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            <input class="form-control" id="txtClave" type="password" placeholder="INGRESE CLAVE:" name="clave" aria-label="clave" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            <input class="form-control" id="txtClave1" type="password" placeholder="INGRESE CLAVE:" name="clave1" aria-label="clave1" aria-describedby="basic-addon1">
        </div>
        <div class="d-grid gap-2 my-5">
            <button type="submit" class="btn btn-success" name="btn"><i class="fas fa-plus"></i> Guardar</button>
        </div>
        

        <input type="hidden" name="m" value="guardar">
    </form>
</div>

<?php
require_once("layouts/footer.php");
