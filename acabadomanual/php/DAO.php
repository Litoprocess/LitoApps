<?php

class DAO {

    private $_dbh;

    function __construct() {

        $dsn = 'sqlsrv:server=192.168.2.217;Database=AcabadoManual';
        $user = "sa";
        $password = "TcpkfcW8l1t0";
        $this->_dbh = new PDO($dsn, $user, $password);
    }

    public function getData($sql, $binds = null) {
        try {
            $stmt = $this->_dbh->prepare($sql);
            $stmt->execute($binds);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertaSql($sql, $binds = null) {
        try {
            $stmt = $this->_dbh->prepare($sql);
            $stmt->execute($binds);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
