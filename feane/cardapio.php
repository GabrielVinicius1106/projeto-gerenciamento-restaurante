<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/elisson.css" />
    
                
    
</head>
<body id="bodyCardapio" class="pagina-cardapio">
    <?php
        include("php/funcoes.php");
        ?>
    <a href="telainicialAdmin.php">Voltar</a>
    <h1>Cardápio</h1>
    <table id="tableCardapio">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor Unitário</th>
                <th>Disponibilidade</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php echo carregaCardapio(); ?>
        </tbody>    
    </table>
    
    <a href="adicionarItem.php"><input class="ajustebotao" type="button" value="Adicionar Item"></a>
</body>
</html>