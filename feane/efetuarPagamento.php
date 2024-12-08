<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
  session_start();
}
$idTipoUsuario = $_SESSION['idTipoUsuario'];
$idPedido = $_GET['idPedido'];

include('php/global.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caixa | Efetuar Pagamento</title>
  <link rel="stylesheet" href="dist/css/elisson.css">
</head>
<body>
  <a href="caixa.php">Voltar</a>

  <h1>Fechamento Pedido <?php echo $idPedido; ?></h1>
  <div id="fechamento">
    <table id="tableCardapio">
      <thead>
          <tr>
          <th><strong>ID Pedido</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Qntd Pessoas</strong></th>
          <th><strong>Data</strong></th>
          <th><strong>ID Mesa</strong></th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <?php echo carregaPedidoFechamento($idPedido); ?>
          </tr>
      </tbody>
    </table>

    <h1>Itens do Pedido</h1>
    <table id="tableCardapio">
      <thead>
          <tr>
            <th><strong>Item</strong></th>
            <th><strong>Quantidade</strong></th>
            <th><strong>Valor Unitário</strong></th>
            <th><strong>Subtotal</strong></th>
          </tr>
      </thead>
      <tbody>
            <?php echo carregaItensFechamento($idPedido); ?>
      </tbody>
    </table>
  </div>

</body>
</html>