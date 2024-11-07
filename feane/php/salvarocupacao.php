<?php
$id = $_GET["id"];
$ocp = $_POST["nInput"];

include("conection.php");

$sql = "UPDATE mesa SET ocupacao = $ocp WHERE id_mesa = $id;";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: ../mesas.php");   
?>