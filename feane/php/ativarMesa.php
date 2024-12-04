<?php 

$idMesa = $_GET['idMesa'];

include('conection.php');

$sql = "UPDATE mesa SET ativo = 1 WHERE id_mesa = $idMesa;";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result) {
    header('location: ../adicionarMesa.php');
}

?>