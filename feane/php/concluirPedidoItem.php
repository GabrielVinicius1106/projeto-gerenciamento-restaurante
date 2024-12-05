<?php 

$origem = $_GET['origem'];
$idPedidoItem = $_GET['idPedidoItem'];

$sql = "UPDATE pedido_item
        SET status_pedido_item = 'Concluído'
        WHERE id_pedido_item = $idPedidoItem;";
    
include('conection.php');

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($origem == 'cozinha'){
        header('location: ../pedidosItemCozinha.php');
} else if ($origem == 'copa'){
        header('location: ../pedidosItemCopa.php');
}



?>