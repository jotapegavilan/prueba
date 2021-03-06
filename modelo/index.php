<?php
require_once("utils/password.php");
class Modelo
{
    private $Modelo;
    private $db;
    private $datos;
    public function __construct()
    {
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=prueba', "root", "");
    }
    public function insertar($tabla, $data)
    {
        $respuesta = new stdClass();
        $respuesta->error = 0;
        $consulta = "insert into " . $tabla . " values(null," . $data . ")";
        $resultado = $this->db->query($consulta);
        if ($resultado == false) {
            if ($this->db->errorInfo()[1] == 1062) {
                $respuesta->error = 1062;
            }
        }

        return $respuesta;
    }
    public function verifyEmail($email)
    {
        $consul = "select * from usuarios where email = '$email';";
        $resu = $this->db->query($consul);
        return $resu->rowCount();
    }


    public function logear($email, $password)
    {
        $consul = "select * from usuarios where email = '$email';";
        $resu = $this->db->query($consul);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {

            if (Password::verify($password, $filas[0]["clave"])) {
                return $filas[0];
            }
        }
        return null;
    }

    public function mostrar($tabla, $condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . " order by id desc;";

        $resu = $this->db->query($consul);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }

    public function actualizar($tabla, $data, $condicion)
    {
        $consulta = "update " . $tabla . " set " . $data . " where " . $condicion;
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar($tabla, $condicion)
    {
        $eli = "delete from " . $tabla . " where " . $condicion;
        $res = $this->db->query($eli);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
