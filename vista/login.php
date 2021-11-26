<?php
require_once("layouts/header.php");
if($_GET){
    if(isset($_GET["error"])){
        ?>
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            Credenciales invalidas, reintente
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
}
?>
<div class="row justify-content-center bg-secondary p-3">
    <div class="col-8 col">
        <img src="vista/images/login2.png" class="rounded mx-auto d-block w-50 mt-5" alt="...">
    </div>
    <form action="" method="post" class="form col-4 bg-dark p-3 rounded">
        <h2 class="text-warning my-5">Ingresa tus credenciales</h2>
        <div class="input-group my-5">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
            <input class="form-control" type="email" placeholder="Ingrese su email" name="email" aria-label="email" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-5">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            <input class="form-control" type="password" placeholder="Ingrese su contraseña" name="clave" aria-label="clave" aria-describedby="basic-addon1">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto my-5">
            <button type="submit" class="btn btn-warning" name="btn">Iniciar sesión <i class="fas fa-sign-in-alt"></i></button>
        </div>
        <input type="hidden" name="m" value="logear">
        <div class="col-6 mx-auto my-5">
            <span class="text-warning fs-6 fw-light">¿No estás registrado?</span>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto ">
            <a href="index.php?m=nuevo" class="btn btn-warning" name="btn">Registrate <i class="fas fa-user-plus"></i></a>

        </div>
    </form>
</div>


<?php
require_once("layouts/footer.php");
