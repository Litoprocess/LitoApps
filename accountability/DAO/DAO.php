<?php

class DAO {

    private $_dbh;

    function __construct() {

        $dsn = 'sqlsrv:server=192.168.2.211;Database=Accountability';
        $user = "sa";
        $password = "TcpkfcW8l1t0";
        $this->_dbh = new PDO($dsn, $user, $password);
    }

    protected function consultar($sql, $binds = null) {
        try {
            $stmt = $this->_dbh->prepare($sql);
            $stmt->execute($binds);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function insertar($sql, $binds = null) {
        try {           
            $stmt = $this->_dbh->prepare($sql); 
            $stmt->execute($binds);
            $result = $this->_dbh->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }      
       return $result;
    }

    protected function insertar2($sql, $binds = null) {
        try {           
            $stmt = $this->_dbh->prepare($sql);         
            $result = $stmt->execute($binds);   
            //var_dump($stmt);
            //exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }      
       return $result;
    }    

    protected function actualizar($sql, $binds = null) {
        try {
            $stmt = $this->_dbh->prepare($sql);
            $result = $stmt->execute($binds);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }    

}
