<?php 

include('php/funcoes.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cárdapio | Editar Item</title>

    <link rel="stylesheet" href="dist/css/global.css">

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Editar Item</h1>
    <form action="#" method="POST">
        <p>Descrição: <input type="text" name="nItem" value="<?php echo carregaValores($_GET['id'], 'descricao_item');?>"></p>
        <p>Preço: <input type="text" name="nValor" value="<?php echo carregaValores($_GET['id'], 'valor_item');?>"></p>
        <p>Categoria: 
            <?php echo carregaCategoriasValores($_GET['id'], 'tipo_item_id_tipo_item');?>
        </p>
        <input type="submit" value="Salvar">
        <input type="reset" value="Excluir">
        <a href="cardapio.php"><input type="button" value="Cancelar"></a>
    </form>
</body>
</html>