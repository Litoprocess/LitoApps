<?php 
require "conexion.php;"
   /* class Ctascoti 
    {
        var $sql = "";
        var $con = "";
        var $conm = "";
        var $conn = ""; 

        function __construct()
        {
            include_once 'class_conexion.php';
            $this->conn = new Conexion();
            $this->con = $this->conn->sql();	
        }*/

/*----------- Consulta para obtener los mater�ales que utiliza el Plotter ------------ */
	function materialesPlotter()
        {
            try
            {
                $this->sql = "SELECT * FROM materiales_cotizador WHERE ACTIVO = 1 Order by NOMBRE_MATERIAL ASC";
                $this->sql=$this->con->query($this->sql);
                //print_r($this->sql);
                //exit();	
            }
            catch (PDOException $e)
            {
                die('error en la consulta');
                return $e->getMessage();
            }
            return $this->sql;
	}
        
/*----------- Consulta para obtener los Acabados para el Plotter ------------ */
	function acabadosPlotter() 
        {
            try 
            {
                $this->sql = "SELECT * FROM ACABADOS WHERE ACTIVO = 1 ORDER BY DESCRIPCION ASC";
                $this->sql=$this->con->query($this->sql);
                print_r($this->sql);
                exit();	
            } 
            catch (PDOException $e) 
            {
                die('error en la consulta');
                return $e->getMessage();
            }
            return $this->sql;
	}
        
/*----------- Consulta para obtener el Laminado para el Plotter ------------ */
	function laminadoPlotter() 
        {
            try 
            {
                $this->sql = "SELECT * FROM LAMINADO_PLOTTER WHERE ACTIVO = 1 ORDER BY DESCRIPCION ASC";
                $this->sql=$this->con->query($this->sql);
                //print_r($this->sql);
                //exit();	
            } 
            catch (PDOException $e) 
            {
                die('error en la consulta');
                return $e->getMessage();
            }
            return $this->sql;
	}
    }
?>