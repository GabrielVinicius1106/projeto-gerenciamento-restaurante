<?php 
$id = $_GET["id"];
include("conection.php");

$sql = "UPDATE mesa SET ativo = 0 WHERE id_mesa = $id;";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);

header("location: ../mesas.php");

?>