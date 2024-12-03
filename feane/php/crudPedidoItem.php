<?php 

date_default_timezone_set('America/Sao_Paulo');
include('funcoes.php');

$operacao = $_GET['operacao'];
$idPedido = $_GET['idPedido'];
$idMesa = $_GET['idMesa'];
$idItem = $_POST['nIdItem'];
$quantidadeItem = $_POST['nQuantidade'];
$obs = $_POST['nObs'];

// var_dump($hora);
// die();

// var_dump($operacao, $idPedido, $idMesa, $idItem, $quantidadeItem, $obs);

include('conection.php');

if ($operacao == 'insert'){

    $sql = "INSERT INTO pedido_item (quantidade_itens, obs_item, pedido_id_pedido, item_id_item, hora_pedido_item, status_pedido_item)
            VALUES 
                ($quantidadeItem, '".$obs."', $idPedido, $idItem, CURRENT_TIMESTAMP(), 'Preparando...');";
}

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: ../pedidoMesa.php?id=$idMesa");

?>