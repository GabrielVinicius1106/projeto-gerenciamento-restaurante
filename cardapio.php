<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>

    <link rel="stylesheet" href="dist/css/global.css">

</head>
<body>
    <?php
        include("php/funcoes.php");
    ?>
    <a href="telainicial.php">Voltar</a>
    <h1>Cardápio</h1>
    <table>
        <thead>
        <tr>
            <th>Descrição</th>
            <th>Valor Unitário</th>
            <th colspan="2">Opões</th>
        </tr>
        </thead>
        <tbody>
            <?php echo carregaCardapio(); ?>
        </tbody>    
    </table>
    <a href="adicionarItem.php"><input type="button" value="Adicionar Item"></a>

</body>
</html>