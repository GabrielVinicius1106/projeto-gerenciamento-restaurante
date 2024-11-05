<?php 

include('php/funcoes.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cárdapio | Excluir Item</title>

    <link rel="stylesheet" href="dist/css/elisson.css">

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Editar Item</h1>
    <form action="#" method="POST">
        <p>Nome: <input type="text" name="nItem" value="<?php echo carregaValores($_GET['id'], 'descricao_item');?>"></p>
        <p>Preço: <input type="text" name="nValor" value="<?php echo carregaValores($_GET['id'], 'valor_item');?>"></p>
        <p>Tipo de Item: 
            <select name="nTipo">
                <option value="<?php echo idTipoItem($_GET['id']);?>"> <?php echo descricaoTipoItem($_GET['id']);?> </option>
                <?php echo carregaTipoItem(idTipoItem($_GET['id']));?>
            </select>
        </p>
        <p>Categoria: 
            <?php echo carregaCategoria($_GET['id']);?>
        </p>
        <input type="submit" value="Salvar">
        <a href="cardapio.php"><input type="button" value="Cancelar"></a>
    </form>
</body>
</html>