<?php
class DataAccessObject
{
    private static DataAccessObject $DataAccessObject;
    private PDO $pdo;
 
    private function __construct()
    {
        try
        { 
            $this->pdo = new PDO('mysql:host=localhost;dbname='.Constants::$DB_NAME.';charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->pdo->exec("SET CHARACTER SET utf8");
        } 
        catch (PDOException $e) 
        { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }
 
    public function Query(string $sql)
    { 
        return $this->pdo->prepare($sql); 
    }
    
    public function RetornarUltimoIdInsertado()
    { 
        return $this->pdo->lastInsertId(); 
    }
 
    public static function Get()
    { 
        if (!isset(self::$DataAccessObject)) 
        {          
            self::$DataAccessObject = new DataAccessObject(); 
        } 
        return self::$DataAccessObject;        
    }
 
 
    // Evita que el objeto se pueda clonar
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
}