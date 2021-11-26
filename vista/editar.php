<?php
require_once("layouts/header.php");
if ($_GET) {
    if (isset($_GET["error"])) {
?>
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                Error : <?= $_GET["error"] ?> no cumple con el mínimo de caracteres.
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
}
?>

<div class="row justify-content-center bg-dark">
    <h1 class="text-center text-white">Editar</h1>
    <form action="" method="post" class="form col-6" onsubmit="validarForm(event,'mod')">
        <?php
        foreach ($dato as $key => $value) :
            foreach ($value as $v) :
        ?>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input class="form-control" id="txtNombre" type="text" value="<?php echo $v['nombre'] ?>" placeholder="Ingrese nombre:" name="nombre" aria-label="nombre" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                    <input class="form-control" id="txtApellido" type="text" value="<?php echo $v['apellido'] ?>" placeholder="Ingrese apellido:" name="apellido" aria-label="apellido" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                    <input readonly class="form-control" id="txtEmail" type="email" value="<?php echo $v['email'] ?>" placeholder="Ingrese email:" name="email" aria-label="email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    <input class="form-control" id="txtNacimiento" type="date" value="<?php echo $v['nacimiento'] ?>" name="nacimiento" aria-label="nacimiento" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input class="form-control" id="txtClave" type="password" placeholder="Ingrese contraseña:" name="clave" aria-label="clave" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input class="form-control" id="txtClave1" type="password" placeholder="Ingrese contraseña:" name="clave1" aria-label="clave1" aria-describedby="basic-addon1">
                </div>

                <input type="hidden" value="<?php echo $v['id'] ?>" name="id">

                <div class="d-grid gap-2 my-5">
                    <button type="submit" class="btn btn-success" name="btn"><i class="far fa-save"></i> Guardar</button>
                    <input type="hidden" name="m" value="actualizar">
                    <a href="<?= urlsite ?>" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar</a>

                </div>

        <?php
            endforeach;
        endforeach;
        ?>
    </form>
</div>

<?php
require_once("layouts/footer.php");
