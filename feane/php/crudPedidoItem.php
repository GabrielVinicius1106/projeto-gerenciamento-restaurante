<?php 

include('funcoes.php');

$operacao = $_GET['operacao'];
$idPedido = $_GET['id'];
$idItem = $_POST['nIdItem'];
$quantidadeItem = $_POST['nQuantidade'];
$obs = $_POST['nObs'];

if ($quantidadeItem <= 0){
    header('location: ../pedidos.php');
    die();
}

// var_dump("Id Pedido: ".$idPedido,"Id Item: ".$idItem, $quantidadeItem, $obs);
// die();

$list = '';

switch($operacao){

    case 'insert': 
        // Insert
        $sql = "INSERT INTO pedido_item (quantidade_itens, obs_item, pedido_id_pedido, item_id_item)
                    VALUES (".$quantidadeItem.", '".$obs."', ".$idPedido.", ".$idItem.");";
        break;
    case 'update':
        // Update

        break;
    case 'delete':
        // Delete

        break;
    default:
        header('location: ../pedidos.php');
        break;
}

include('conection.php');

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: ../pedidos.php");


?>