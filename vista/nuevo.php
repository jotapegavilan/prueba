<?php
require_once("layouts/header.php");
$nombre = "";
$apellido = "";
$email = "";
$nacimiento = "";
if ($_GET) {
    if (isset($_GET["error"])) {
?>
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                <?php
                if ($_GET["error"] == "duplicado") {
                ?>
                    Error el email ingresado ya está en nuestros registros
                <?php
                } else {
                ?>
                    Error : <?= $_GET["error"] ?> no cumple con el mínimo de caracteres.
                <?php
                }
                ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
    }
    if (isset($_GET["apellido"])) {
        $apellido = $_GET["apellido"];
    }
    if (isset($_GET["email"])) {
        $email = $_GET["email"];
    }
    if (isset($_GET["nacimiento"])) {
        $nacimiento = $_GET["nacimiento"];
    }
}
?>
<div class="row justify-content-center bg-dark">
    <h1 class="text-white text-center">Nuevo usuario</h1>
    <form action="" method="POST" class="form col-6" onsubmit="validarForm(event,'new')">
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
            <input class="form-control" value="<?= $nombre ?>" id="txtNombre" type="text" placeholder="Ingrese nombre:" name="nombre" aria-label="nombre" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
            <input class="form-control" value="<?= $apellido ?>" id="txtApellido" type="text" placeholder="Ingrese apellido:" name="apellido" aria-label="apellido" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
            <input class="form-control" value="<?= $email ?>" id="txtEmail" type="email" placeholder="Ingrese email:" name="email" aria-label="email" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
            <input class="form-control" value="<?= $nacimiento ?>" id="txtNacimiento" type="date" name="nacimiento" aria-label="nacimiento" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            <input class="form-control" id="txtClave" type="password" placeholder="Ingrese contraseña:" name="clave" aria-label="clave" aria-describedby="basic-addon1">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            <input class="form-control" id="txtClave1" type="password" placeholder="Repita contraseña:" name="clave1" aria-label="clave1" aria-describedby="basic-addon1">
        </div>
        <div class="d-grid gap-2 my-5">
            <button type="submit" class="btn btn-success" name="btn"><i class="fas fa-plus"></i> Guardar</button>
        </div>


        <input type="hidden" name="m" value="guardar">
    </form>
</div>

<?php
require_once("layouts/footer.php");
