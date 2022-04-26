<?php
class Usuario
{
    // private $_id;
    private $_nombre;
    private $_apellido;
    private $_clave;
    private $_mail;
    private $_localidad;
    // private $_fecha_de_registro;

    public function __construct($nombre, $apellido, $clave, $mail, $localidad)
    {
        if ($nombre && is_string($nombre)) 
        {
            $this->_nombre = $nombre;
        }
        if ($apellido && is_string($apellido)) 
        {
            $this->_apellido = $apellido;
        }
        if ($clave && is_string($clave)) 
        {
            $this->_clave = base64_encode($clave);
        }
        if ($mail && is_string($mail))
        {
            $this->_mail = $mail;
        }
        if ($localidad && is_string($localidad))
        {
            $this->_localidad = $localidad;
        }
    }


    public function AltaUsuarioBD()
    {
        try 
        {
            $conStr = "mysql:host=localhost;dbname=utn_prog3";
            $pdo = new PDO($conStr, "root");
    
            $sentencia = $pdo->prepare('INSERT INTO usuario (nombre, apellido, clave, mail, localidad, fecha_de_registro) VALUES (:nombre, :apellido, :clave, :mail, :localidad, :fecha_de_registro);');
            $sentencia->bindParam(":nombre", $this->_nombre);
            $sentencia->bindParam(":apellido", $this->_apellido);
            $sentencia->bindParam(":clave", $this->_clave);
            $sentencia->bindParam(":mail", $this->_mail);
            $sentencia->bindParam(":localidad", $this->_localidad);
            $sentencia->bindValue(":fecha_de_registro", date_create()->format('Y-m-d H:i:s'));
            return $sentencia->execute();
        }
        catch (PDOException $ex)
        {
            echo "Error: " . $ex->getMessage() . "<br>";
            return false;
        }
    }
}
