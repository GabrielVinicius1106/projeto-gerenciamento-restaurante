<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$idTipoUsuario = $_SESSION['idTipoUsuario'];

if($idTipoUsuario != 1 && $idTipoUsuario != 2 && $idTipoUsuario != 5){
    header('location: index.php');
}

include('php/global.php');
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
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssModal.css" />

    <style>
        /* Definindo a cor do texto das células e cabeçalhos da tabela */
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 0 auto;  /* Centraliza a tabela horizontalmente */
        }

        table th, table td {
            color: black;  /* Definindo a cor preta */
            padding: 8px;
            border: 1px solid #ddd; /* Adicionando uma borda */
            text-align: center;
        }

        table th {
            background-color: #f2f2f2; /* Cor de fundo para os cabeçalhos */
        }
    </style>
</head>
<body>
    <a href="mesas.php">Voltar</a>
    <h1>Pedido da mesa <?php echo $idMesa; ?> </h1>
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

    <?php 
    
        if($idTipoUsuario == 1 || $idTipoUsuario == 2){
            echo '<form action="php/crudPedido.php?operacao=fecharpedido&idMesa='.$idMesa.'" method="POST">
                    <input type="submit" value="Fechar Pedido" class="ajustebotao">
                  </form>
                  <form action="solicitarItens.php?idMesa='.$idMesa.'&idPedido='.$idPedido.'" method="POST">
                    <input type="submit" value="Adicionar Itens" class="ajustebotao">
                  </form>';
        }
    
    ?>
    
</body>
</html>