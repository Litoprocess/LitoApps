<?php 

include_once 'DAO.php';

class EmpleadoDAO extends DAO
{
	function consultarxid($id)
	{
		$sql = "SELECT * FROM v_FechaAlta WHERE Personal = :id";
		$parametros = array('id'=>$id);
		return $this->consultar($sql,$parametros);

	}
}


?>