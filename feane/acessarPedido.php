<?php 
session_start();
$idTipoUsuario = $_SESSION['idTipoUsuario'];

include('php/global.php');

$idPedido = $_GET['idPedido'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caixa | Pedidos | Efetuar Pagamento</title>
</head>
<body>
  <h1>Pedido <?php echo $idPedido;?> </h1>
  <h1>Itens do Pedido</h1>
</body>
</html>