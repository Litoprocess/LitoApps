<?php 

include_once 'DAO.php';

class ListadoDAO extends DAO
{
	function listar()
	{
		$sql = "SELECT Id, Fecha, Nombre, Equipo, Brecha FROM cuestionario";
		return $this->consultar($sql,null);
	}
}
?>