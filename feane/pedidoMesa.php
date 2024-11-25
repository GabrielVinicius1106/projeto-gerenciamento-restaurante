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
</body>
</html>