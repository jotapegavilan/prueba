<?php
require_once("layouts/header.php");
?>
<h1 class="text-center">Bienvenido</h1>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Email</td>
        <td>Fecha de nacimiento</td>
    </tr>
    <tbody>
        <?php
        if (!empty($dato)) :

        ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <i class="fas fa-check-circle"></i> Inicio de sesión exitoso
                </div>
            </div>
            <tr>
                <td><?php echo $dato['id'] ?> </td>
                <td><?php echo $dato['nombre'] ?> </td>
                <td><?php echo $dato['apellido'] ?> </td>
                <td><?php echo $dato['email'] ?> </td>
                <td><?php echo $dato['nacimiento'] ?> </td>

            </tr>

        <?php else : ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <i class="fas fa-times"></i> Inicio de sesión fallido
                </div>
            </div>
            <tr>
                <td colspan="6">NO HAY REGISTROS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?php
require_once("layouts/footer.php");
