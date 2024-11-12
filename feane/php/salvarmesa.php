<?php
$id = $_GET["id"];
$ocp1 = $_POST["nOcp"];

include("conection.php");

$sql = "UPDATE mesa SET capacidade = $ocp1 WHERE id_mesa = $id;";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: ../mesas.php");   
?>