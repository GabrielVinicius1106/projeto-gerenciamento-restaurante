<?php 
include('php/funcoes.php');
include('php/conection.php');
include('php/funcoesPedido.php');

$idMesa = $_GET['id'];
$idPedido = getIdPedido($idMesa);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas | Pedido</title>
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssModal.css" />

    <style>
        table th, table td {
            color: black;  /* Definindo a cor preta */
        }
    </style>
</head>
<body>
    <a href="mesas.php">Voltar</a>
    <h1>PEDIDO MESA <?php echo $idMesa; ?> </h1>
    <table>
        <tr>
            <th>ID do Pedido</th>
            <th>Status</th>
            <th>Qntd Pessoas</th>
            <th>Data</th>
            <th>ID da Mesa</th>
        </tr>
        <tr>
            <?php echo carregaPedido($idMesa); ?>
        </tr>
    </table>
    <table>
		<?php echo carregaItensPedido($idPedido); ?>
    </table>
    <br>
    <form action="php/crudPedido.php?operacao=fecharpedido&idMesa=<?php echo $idMesa;?>" method="POST">
        <input type="submit" value="Fechar Pedido">
    </form>
    <form action="solicitarItens.php?idMesa=<?php echo $idMesa;?>&idPedido=<?php echo $idPedido?>" method="POST">
        <input type="submit" value="Adicionar Itens">
    </form>
</body>
</html>