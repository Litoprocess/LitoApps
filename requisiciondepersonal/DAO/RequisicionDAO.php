<?php 

include_once 'DAO.php';

class RequisicionDAO extends DAO
{
	function listar($where)
	{
		if($where->NombreUsuario != "INTEGRACION" && $where->NombreUsuario != "SERGIO GARCIA" )
		{
			$sql = "SELECT * from Requisiciones where NombreSolicitante = :NombreUsuario";
			$parametros = array("NombreUsuario" => $where->NombreUsuario);
			return $this->consultar($sql,$parametros);
		}
		else
		{
			$sql = "SELECT * from Requisiciones";
			return $this->consultar($sql,null);			
		}
	}

	function generar($requisicion)
	{
		$sql = "INSERT INTO Requisiciones(FechaRegistro,NombreSolicitante,DepartamentoSolicitante,PuestoSolicitante,GerenciaSolicitante,PuestoSolicitado,JefeInmediato,PuestoJefeInmediato,OrigenVacante,TipoContrato,ContratoMeses,ObjetivoPuesto,Escolaridad,ConocimientosTeoricos,Idioma1,PorcentajeIdioma1,Idioma2,PorcentajeIdioma2,Experiencia,DisponibilidadViajar,PorcentajeTiempoViajar,DisponibilidadCambioResidencia,CapacidadIntelectual,IniciativayEmpuje,ManejodePersonal,TomadeDesiciones,RelacionesInterpersonales,EstabilidadEmocional,ToleranciaPresion,Organizacion,ApegoaNormas,Otra,FechaDeseadaContratacion,ComentariosAdicionales,Estatus,Nivel) VALUES(:FechaRegistro,:NombreSolicitante,:DepartamentoSolicitante,:PuestoSolicitante,:GerenciaSolicitante,:PuestoSolicitado,:JefeInmediato,:PuestoJefeInmediato,:OrigenVacante,:TipoContrato,:ContratoMeses,:ObjetivoPuesto,:Escolaridad,:ConocimientosTeoricos,:Idioma1,:PorcentajeIdioma1,:Idioma2,:PorcentajeIdioma2,:Experiencia,:DisponibilidadViajar,:PorcentajeTiempoViajar,:DisponibilidadCambioResidencia,:CapacidadIntelectual,:IniciativayEmpuje,:ManejodePersonal,:TomadeDesiciones,:RelacionesInterpersonales,:EstabilidadEmocional,:ToleranciaPresion,:Organizacion,:ApegoaNormas,:Otra,:FechaDeseadaContratacion,:ComentariosAdicionales,:Estatus,:Nivel)";
		$parametros = array(
							"FechaRegistro" => $requisicion->FechaRegistro,
							"NombreSolicitante" => $requisicion->NombreSolicitante,
							"DepartamentoSolicitante" => $requisicion->DepartamentoSolicitante,
							"PuestoSolicitante" => $requisicion->PuestoSolicitante,
							"GerenciaSolicitante" => $requisicion->GerenciaSolicitante,
							"Nivel" => $requisicion->Nivel,
							"PuestoSolicitado" => $requisicion->PuestoSolicitado,
							"JefeInmediato" => $requisicion->JefeInmediato,
							"PuestoJefeInmediato" => $requisicion->PuestoJefeInmediato,
							"OrigenVacante" => $requisicion->OrigenVacante,
							"TipoContrato" => $requisicion->TipoContrato,
							"ContratoMeses" => $requisicion->ContratoMeses,
							"ObjetivoPuesto" => $requisicion->ObjetivoPuesto,
							"Escolaridad" => $requisicion->Escolaridad,
							"ConocimientosTeoricos" => $requisicion->ConocimientosTeoricos,
							"Idioma1" => $requisicion->Idioma1,
							"PorcentajeIdioma1" => $requisicion->PorcentajeIdioma1,
							"Idioma2" => $requisicion->Idioma2,
							"PorcentajeIdioma2" => $requisicion->PorcentajeIdioma2,
							"Experiencia" => $requisicion->Experiencia,
							"DisponibilidadViajar" => $requisicion->DisponibilidadViajar,
							"PorcentajeTiempoViajar" => $requisicion->PorcentajeTiempoViajar,
							"DisponibilidadCambioResidencia" => $requisicion->DisponibilidadCambioResidencia,
							"CapacidadIntelectual" => $requisicion->CapacidadIntelectual,
							"IniciativayEmpuje" => $requisicion->IniciativayEmpuje,
							"ManejodePersonal" => $requisicion->ManejodePersonal,
							"TomadeDesiciones" => $requisicion->TomadeDesiciones,
							"RelacionesInterpersonales" => $requisicion->RelacionesInterpersonales,
							"EstabilidadEmocional" => $requisicion->EstabilidadEmocional,
							"ToleranciaPresion" => $requisicion->ToleranciaPresion,
							"Organizacion" => $requisicion->Organizacion,
							"ApegoaNormas" => $requisicion->ApegoaNormas,
							"Otra" => $requisicion->Otra,
							"FechaDeseadaContratacion" => $requisicion->FechaDeseadaContratacion,
							"ComentariosAdicionales" => $requisicion->ComentariosAdicionales,
							"Estatus" => $requisicion->Estatus
						);
		return $this->insertar($sql,$parametros);
	}

	function actualizarDatos($datos)
	{
		$sql = "UPDATE Requisiciones SET $datos->campo = :sueldo WHERE Id = :id";
		$parametros = array(
							"sueldo" => $datos->sueldo,
							"id" => $datos->id
			);
		return $this->actualizar($sql,$parametros);
	}

	function finalizar($datos)
	{
		$sql = "UPDATE Requisiciones SET Estatus = :estatus, FechaAlta = :altaFecha, IdIntelisis = :idEmpleado, NombreEmpleado = :nombreEmpleado, FechaFinElaboracion = getdate() WHERE Id = :id";
		$parametros = array(
							"id" => $datos->id,
							"estatus" => $datos->estatus,
							"altaFecha" => $datos->altaFecha,
							"nombreEmpleado" => $datos->nombreEmpleado,
							"idEmpleado"=> $datos->idEmpleado
			);
		return $this->actualizar($sql,$parametros);
	}

	function pdf($datos)
	{
		$sql = "SELECT * from Requisiciones WHERE Id = :id";
		$parametros = array(
							"id" => $datos->id
			);
		return $this->consultar($sql,$parametros);
	}		
}
?>