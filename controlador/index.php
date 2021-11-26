<?php
require_once("utils/password.php");
require_once("modelo/index.php");
class modeloController
{
    private $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }

    static function verifyEmail()
    {
        $modelo   = new Modelo();
        $resp = new stdClass();
        if (isset($_REQUEST['email'])) {
            if ($modelo->verifyEmail($_REQUEST['email']) > 0) {
                $resp->status = 'ocupado';
            } else {
                $resp->status = 'libre';
            }
            echo json_encode($resp);
        }
    }

    static function index()
    {
        $modelo   = new Modelo();
        $dato       =   $modelo->mostrar("usuarios", "1");
        require_once("vista/index.php");
    }

    static function login()
    {
        require_once("vista/login.php");
    }

    static function logear()
    {
        if (isset($_REQUEST['email']) && isset($_REQUEST['clave'])) {
            if (strlen($_REQUEST['email']) < 6 || strlen($_REQUEST['clave']) < 6) {
                header("location:" . urlsite . "?m=login&error=yes");
            }
            $email = $_REQUEST['email'];
            $clave = $_REQUEST['clave'];
            $modelo = new Modelo();
            $dato = $modelo->logear($email, $clave);
            require_once("vista/home.php");
        }
    }

    static function nuevo()
    {
        require_once("vista/nuevo.php");
    }

    static function guardar()
    {
        if (
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['email'])
            && isset($_REQUEST['nacimiento']) && isset($_REQUEST['clave'])
        ) {
            $campos = "&nombre=".$_REQUEST['nombre']."&apellido=".$_REQUEST['apellido']."&email=".$_REQUEST['email'].
            "&nacimiento=".$_REQUEST['nacimiento'];
            if (strlen($_REQUEST['nombre']) < 3) {                
                header("location:" . urlsite . "?m=nuevo&error=nombre".$campos);
            } else if (strlen($_REQUEST['apellido']) < 4) {
                header("location:" . urlsite . "?m=nuevo&error=apellido".$campos);
            } else if (strlen($_REQUEST['email']) < 6) {
                header("location:" . urlsite . "?m=nuevo&error=email".$campos);
            } else if (strlen($_REQUEST['nacimiento']) < 10) {
                header("location:" . urlsite . "?m=nuevo&error=nacimiento".$campos);
            } else if (strlen($_REQUEST['clave']) < 6) {                
                header("location:" . urlsite . "?m=nuevo&error=clave");
            } else {
                $nombre = $_REQUEST['nombre'];
                $apellido = $_REQUEST['apellido'];
                $email = $_REQUEST['email'];
                $nacimiento = $_REQUEST['nacimiento'];
                var_dump($nacimiento);
                $clave = $_REQUEST['clave'];
                $encriptada = Password::hash($clave);
                $data = "'$nombre','$apellido','$email','$nacimiento','$encriptada'";
                $modelo = new Modelo();
                $dato = $modelo->insertar("usuarios", $data);
                if($dato->error == 1062){
                    
                    header("location:" . urlsite . "?m=nuevo&error=duplicado");
                }else{
                    header("location:" . urlsite . "?action=created");
                }
                
                
            }
        }
    }

    static function editar()
    {
        $id = $_REQUEST['id'];
        $producto = new Modelo();
        $dato = $producto->mostrar("usuarios", "id=" . $id);
        require_once("vista/editar.php");
    }

    static function actualizar()
    {
        if (
            isset( $_REQUEST['id']) &&
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['email'])
            && isset($_REQUEST['nacimiento']) && isset($_REQUEST['clave'])
        ) {
            $campos = "&id=".$_REQUEST['id']."&nombre=".$_REQUEST['nombre']."&apellido=".$_REQUEST['apellido']."&email=".$_REQUEST['email'].
            "&nacimiento=".$_REQUEST['nacimiento'];
            if (strlen($_REQUEST['nombre']) < 3) {                
                header("location:" . urlsite . "?m=editar&error=nombre".$campos);
            } else if (strlen($_REQUEST['apellido']) < 4) {
                header("location:" . urlsite . "?m=editar&error=apellido".$campos);
            } else if (strlen($_REQUEST['email']) < 6) {
                header("location:" . urlsite . "?m=editar&error=email".$campos);
            } else if (strlen($_REQUEST['nacimiento']) < 10) {
                header("location:" . urlsite . "?m=editar&error=nacimiento".$campos);
            } else if (strlen($_REQUEST['clave']) < 6) {                
                header("location:" . urlsite . "?m=editar&error=clave".$campos);
            } else {
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $email = $_REQUEST['email'];
        $nacimiento = $_REQUEST['nacimiento'];
        $clave = $_REQUEST['clave'];
        $data = "nombre='$nombre',apellido='$apellido',email='$email',nacimiento='$nacimiento'";
        if (strlen($clave) >= 6) {
            $encriptada = Password::hash($clave);
            $data = $data . ",clave='$encriptada'";
        }

        $model = new Modelo();
        $dato = $model->actualizar("usuarios", $data, "id=" . $id);
        header("location:" . urlsite . "?action=updated");
    }}


        
    }


    static function eliminar()
    {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $dato = $modelo->eliminar("usuarios", "id=" . $id);
        header("location:" . urlsite);
    }
}
