<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />

</head>
<body id="bodyCardapio" class="pagina-cardapio">
    <?php
        include("php/funcoes.php");
    ?>
    <a href="telainicialAdmin.php">Voltar</a>
    <h1>Pedidos</h1>
    <table id="tableCardapio">
        <thead>
        <tr>
            <th>ID Pedido</th>
            <th>Status do Pedido</th>
            <th>Nº de Pessoas</th>
            <th>Data do Pedido</th>
            <th>ID Mesa</th>
            <th>Solicitar Itens</th>
            <th>Editar</th>
        </tr>
        </thead>
        <tbody>
            <?php echo carregaPedidos(); ?>
        </tbody>    
    </table>
    <!-- <a href="adicionarPedido.php"><input type="button" value="Adicionar Item"></a> -->
    <a href=""><input type="button" value="Criar Pedido"></input></a>

</body>
</html>