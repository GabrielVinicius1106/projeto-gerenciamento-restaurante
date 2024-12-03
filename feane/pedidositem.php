<?php
        include("php/funcoes.php");
        include("php/funcoesPedido.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/b33acbe2df.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos de Item</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />

</head>
<body id="bodyCardapio" class="pagina-cardapio">
    <a href="telainicialAdmin.php">Voltar</a>
    <h1>Pedidos da Cozinha</h1>
    <table id="tableCardapio">
        <thead>
            <tr>
                <th>ID do Pedido de Item</th>
                <th>Descrição do Item</th>
                <th>Observação</th>
                <th>ID do Pedido</th>
                <th>ID do Item</th>
                <th>Status do Pedido de Item</th>
                <th>Marcar como Concluído</th>
            </tr>
        </thead>
        <tbody>
            <?php  echo carregaPedidosItemCozinha(); ?>
        </tbody>    
    </table>
    <h1>Pedidos da Copa</h1>
    <table id="tableCardapio">  
        <thead>
            <tr>
                <th>ID do Pedido de Item</th>
                <th>Descrição do Item</th>
                <th>Observação</th>
                <th>ID do Pedido</th>
                <th>ID do Item</th>
                <th>Status do Pedido de Item</th>
                <th>Marcar como Concluído</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
</html>