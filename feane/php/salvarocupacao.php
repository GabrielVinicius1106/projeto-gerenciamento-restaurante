<?php
include('funcoesPedido.php');

$idMesa = $_GET["id"];
$ocp = $_POST["nInput"];

if ($ocp >= 0){
    // Criar/excluir pedido automaticamente ao ocupar/desocupar a mesa
    criarPedido($idMesa, $ocp);
}

include("conection.php");
include("funcoes.php");

$sql = "UPDATE mesa SET ocupacao = $ocp WHERE id_mesa = $idMesa;";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: ../mesas.php");   


?>

    