<?php 

include_once 'DAO.php';

class RequisicionDAO extends DAO
{
	function listar()
	{
		$sql = "SELECT * from Requisiciones";
		return $this->consultar($sql,null);
	}

	function generar($requisicion)
	{
		$sql = "INSERT INTO Requisiciones(FechaInicioElaboracion,NombreSolicitante,DepartamentoSolicitante,PuestoSolicitante,GerenciaSolicitante,PuestoSolicitado,JefeInmediato,PuestoJefeInmediato,OrigenVacante,TipoContrato,ContratoMeses,ObjetivoPuesto,Escolaridad,ConocimientosTeoricos,Idioma1,PorcentajeIdioma1,Idioma2,PorcentajeIdioma2,Experiencia,DisponibilidadViajar,PorcentajeTiempoViajar,DisponibilidadCambioResidencia,CapacidadIntelectual,IniciativayEmpuje,ManejodePersonal,TomadeDesiciones,RelacionesInterpersonales,EstabilidadEmocional,ToleranciaPresion,Organizacion,ApegoaNormas,Otra,FechaDeseadaContratacion,NombreCandidatoInterno,Estatus,Nivel) VALUES(:FechaInicioElaboracion,:NombreSolicitante,:DepartamentoSolicitante,:PuestoSolicitante,:GerenciaSolicitante,:PuestoSolicitado,:JefeInmediato,:PuestoJefeInmediato,:OrigenVacante,:TipoContrato,:ContratoMeses,:ObjetivoPuesto,:Escolaridad,:ConocimientosTeoricos,:Idioma1,:PorcentajeIdioma1,:Idioma2,:PorcentajeIdioma2,:Experiencia,:DisponibilidadViajar,:PorcentajeTiempoViajar,:DisponibilidadCambioResidencia,:CapacidadIntelectual,:IniciativayEmpuje,:ManejodePersonal,:TomadeDesiciones,:RelacionesInterpersonales,:EstabilidadEmocional,:ToleranciaPresion,:Organizacion,:ApegoaNormas,:Otra,:FechaDeseadaContratacion,:NombreCandidatoInterno,:Estatus,:Nivel)";
		$parametros = array(
							"FechaInicioElaboracion" => $requisicion->FechaInicioElaboracion,
							"NombreSolicitante" => $requisicion->NombreSolicitante,
							"DepartamentoSolicitante" => $requisicion->DepartamentoSolicitante,
							"PuestoSolicitante" => $requisicion->PuestoSolicitante,
							"GerenciaSolicitante" => $requisicion->GerenciaSolicitante,
							"Nivel" => $requisicion->Nivel,
							"PuestoSolicitado" => $requisicion->GerenciaSolicitante,
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
							"NombreCandidatoInterno" => $requisicion->NombreCandidatoInterno,
							"Estatus" => $requisicion->Estatus
						);
		return $this->insertar($sql,$parametros);
	}

	function agregarsueldo($datos)
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
		$sql = "UPDATE Requisiciones SET Estatus = :estatus, FechaAlta = :altaFecha, FechaFinElaboracion = getdate() WHERE Id = :id";
		$parametros = array(
							"id" => $datos->id,
							"estatus" => $datos->estatus,
							"altaFecha" => $datos->altaFecha
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