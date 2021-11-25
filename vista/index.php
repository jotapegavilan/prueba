<?php
require_once("layouts/header.php");
if ($_GET) {

?>
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            <i class="fas fa-check-circle"></i> <?php echo $_GET["action"] == "created" ?  "Creacion" :  "Actualización" ?> de usuario correcta
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<div class="">
    <h1 class="text-center">Todos los usuarios registrados</h1>
</div>

<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Email</td>
        <td>Fecha de nacimiento</td>
        <td>Acciones</td>
    </tr>
    <tbody>
        <?php
        if (!empty($dato)) :
            foreach ($dato as $key => $value)
                foreach ($value as $v) : ?>
                <tr>
                    <td><?php echo $v['id'] ?> </td>
                    <td><?php echo $v['nombre'] ?> </td>
                    <td><?php echo $v['apellido'] ?> </td>
                    <td><?php echo $v['email'] ?> </td>
                    <td><?php setlocale(LC_TIME, 'SPANISH.UTF-8');
                        $fecha = $v['nacimiento'];
                        $fecha = str_replace("/", "-", $fecha);			
                        $newDate = date("d-m-Y", strtotime($fecha));				
                        $mesDesc = strftime("%A %d de %B del %Y", strtotime($newDate));
                        echo $mesDesc; ?> </td>
                        
                    <td>
                        <a class="btn btn-dark" href="index.php?m=editar&id=<?php echo $v['id'] ?>"><i class="fas fa-user-edit"></i></a>
                        <a id="btnDelete" class="btn btn-danger" href="index.php?m=eliminar&id=<?php echo $v['id'] ?>" onclick="console.log(eliminar());return false;"><i class="fas fa-user-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">NO HAY REGISTROS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
<a href="index.php?m=nuevo" class="btn btn-primary my-5"><i class="fas fa-user-plus"></i></a>
<?php
require_once("layouts/footer.php");
