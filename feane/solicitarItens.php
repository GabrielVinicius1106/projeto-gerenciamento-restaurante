<?php 
    include('php/funcoes.php');
    include('php/funcoesPedido.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Solicitar Itens</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
</head>
<body>
    
    <h1>Solicitar Itens</h1>

    <form action="php/crudPedidoItem.php?operacao=insert&id=<?php echo $_GET['id'] ?>" method="POST">

        <p>Item: 
            <select name="nIdItem" required>
                <?php echo carregaItens();?>
            </select>
        </p>
        <p>Quantidade: <input type="number" name="nQuantidade" required></p>
        <p>Observações: <input type="text" name="nObs"></p>

        <input type="submit" value="Confirmar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>