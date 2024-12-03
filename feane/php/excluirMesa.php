<?php 
$id = $_GET["id"];
include("conection.php");

$sql = "DELETE FROM mesa WHERE id_mesa = $id;";
$rgit puesult = mysqli_query($conn,$sql);
mysqli_close($conn);

header("location: ../mesas.php");

?>