<?php 

include_once 'DAO.php';

class CuestionarioDAO extends DAO
{
	function nuevocuestionario($cuestionario)
	{
		$sql = "INSERT INTO cuestionario(P1,P2_1,P2_2,P2_3,P3,P4,P5,P6,P7,P8,P9,P10,Fecha,Nombre,Equipo,Brecha,radiobutton) VALUES (:txt1, :txt2, :txt3, :txt4, :txt5, :txt6, :txa1, :txa2, :txa3, :txa4, :txa5, :txa6, :fecha, :nombre, :equipo, :txa7, :radiobutton)";
		//$sql .= " SELECT Scope_Identity() as id";
		$parametros = array(
							'txt1'=>$cuestionario->txt1,
							'txt2'=>$cuestionario->txt2,
							'txt3'=>$cuestionario->txt3,
							'txt4'=>$cuestionario->txt4,
							'txt5'=>$cuestionario->txt5,
							'txt6'=>$cuestionario->txt6,
							'txa1'=>$cuestionario->txa1,
							'txa2'=>$cuestionario->txa2,
							'txa3'=>$cuestionario->txa3,
							'txa4'=>$cuestionario->txa4,
							'txa5'=>$cuestionario->txa5,
							'txa6'=>$cuestionario->txa6,
							'fecha'=>$cuestionario->fecha,
							'nombre'=>$cuestionario->nombre,
							'equipo'=>$cuestionario->equipo,
							'txa7'=>$cuestionario->txa7,
							'radiobutton'=>$cuestionario->radiobutton
						);
		return $this->insertar($sql,$parametros);
	}

	function nuevabrecha($brechas)
	{
		$sql = "INSERT INTO brechas(Id_cuestionario,Nombre,Que,ParaCuando) VALUES (:Id_cuestionario,:Nombre,:Que,:ParaCuando)";
		$parametros = array(
							'Id_cuestionario'=>$brechas->id,
							'Nombre'=>$brechas->nombre,
							'Que'=>$brechas->que,
							'ParaCuando'=>$brechas->cuando
						);
		return $this->insertar2($sql,$parametros);
	}

	function consultarxid($datos)	
	{
		$sql = "SELECT * from cuestionario WHERE Id = :id";
		$parametros = array(
				"id" => $datos->id_cuestionario
			);
		return $this->consultar($sql,$parametros);	
	}
	
}
?>