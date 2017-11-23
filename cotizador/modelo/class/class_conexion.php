<?php 
    class Conexion 
    {
	var $connStr 	= "mysql:host=localhost;dbname=cotizador3";
	var $user 		= "root";
	var $pass		= "";
	var $conn		= "";
	
	function sql() 
        {
            try 
            {
                $this->conn = new PDO($this->connStr,$this->user,$this->pass);
                //print_r("conectado");
                //exit;
            }
            catch(PDOException $pe) 
            {
                die('No se pudo conectar a la base de datos.');
                $pe->getMessage();
            }
            return $this->conn;
	}
    }
?>