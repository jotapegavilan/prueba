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
        if ($modelo->verifyEmail($_REQUEST['email']) > 0) {
            $resp->status = 'ocupado';
        } else {
            $resp->status = 'libre';
        }
        echo json_encode($resp);
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
        $email = $_REQUEST['email'];
        $clave = $_REQUEST['clave'];
        $modelo = new Modelo();
        $dato = $modelo->logear($email, $clave);
        require_once("vista/home.php");
    }
    
    static function nuevo()
    {
        require_once("vista/nuevo.php");
    }
    
    static function guardar()
    {
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
        header("location:" . urlsite . "?action=created");
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
    }


    static function eliminar()
    {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $dato = $modelo->eliminar("usuarios", "id=" . $id);
        header("location:" . urlsite);
    }
}
