<?php 

include('global.php');

$idMesa = $_GET['idMesa'];
$operacao = $_GET['operacao'];

// echo "$operacao $idMesa";

if ($operacao == 'fecharpedido'){

    $sql = "UPDATE pedido
            SET status_pedido = 'Fechado'
            WHERE mesa_id_mesa = $idMesa;";

    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Zerar Ocupação
    include('conection.php');

    $sql = "UPDATE mesa
            SET ocupacao = 0
            WHERE id_mesa = $idMesa;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

}

header('location: ../mesas.php');
?>