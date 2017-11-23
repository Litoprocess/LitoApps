<?php session_start();

include 'conexion.php';

$file = $_POST['file'];

$sql = "DROP TABLE Codigos
CREATE TABLE Codigos (
Guia varchar(50) NULL ,
Sku varchar(50) NULL 
)
BULK INSERT [Codigos] FROM '$file'
   WITH (
      FIELDTERMINATOR = " . addcslashes("'t'", 'A..z') .",
      ROWTERMINATOR ='0x0a'
) UPDATE Codigos SET Guia = Replace(Guia,char(13),''), Sku = Replace(Sku,char(13),'')";

$stmt = sqlsrv_query($conn,$sql);
$response = new stdClass(); 

$response->validacion= "true";

echo json_encode($response);


?>