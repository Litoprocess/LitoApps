<?php session_start();

include_once '../DAO/CuestionarioDAO.php';

$dto = new stdClass();
$dto->id = $_POST['id'];
$data = $_POST['array'];
$longitud = count($_POST['array']);

for($i=0; $i<$longitud ;$i=$i++){
	for($j=0; $j<3; $j++)
	{
		switch ($j) {
				case 0:
					$dto->nombre = $data[$i];
					$i++;
					break;
				case 1:
					$dto->que = $data[$i];
					$i++;
					break;
				case 2:
					$dto->cuando = $data[$i];
					$i++;
					break;
				
				default:
					# code...
					break;
			}
			
		//$dao = new CuestionarioDAO();
		//$datos = $dao->nuevabrecha($dto);
					
	//print_r($data[$i][$j]);
	//saco el valor de cada elemento
	//$dto->$j = $data[$j];
	}
	$dao = new CuestionarioDAO();
	$datos = $dao->nuevabrecha($dto);	
}
//var_dump($dto);
//print_r( $dto );
//var_dump($data);
//


$response = new stdClass();
$response->validacion = ($datos > 0) ? true : false;

//$response->id = $datos;

header('Content-Type: application/json');
echo json_encode($response);

?>