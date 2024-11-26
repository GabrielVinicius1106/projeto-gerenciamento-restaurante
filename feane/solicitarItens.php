<?php 
    include('php/funcoes.php');
    include('php/funcoesPedido.php');

    $idMesa = $_GET['idMesa'];
    $idPedido = $_GET['idPedido'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido | Solicitar Itens</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
</head>
<body>
    <a href="pedidoMesa.php?id=<?php echo $idMesa; ?>">Voltar</a>
    <h1>Solicitar Itens</h1>

    <form action="php/crudPedidoItem.php?operacao=insert&idPedido=<?php echo $idPedido ?>&idMesa=<?php echo $idMesa ?>" method="POST">

        <p>Item: 
            <select name="nIdItem" required>
                <?php echo carregaItens();?>
            </select>
        </p>
        <p>Quantidade: <input type="number" name="nQuantidade" min="1" required></p>
        <p>Observações: <input type="text" name="nObs"></p>

        <input type="submit" value="Confirmar">
        <input type="reset" value="Limpar"> 
        <a href="pedidos.php"><input type="button" value="Cancelar"></a>
    </form>
</body>
</html>