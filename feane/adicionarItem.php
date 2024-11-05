<?php 

include('php/funcoes.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cárdapio | Adicionar Item</title>

    <link rel="stylesheet" href="dist/css/elisson.css">

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Adicionar Item</h1>
    <form action="php/crudItem.php?id=insert" method="POST">
        <p>Nome: <input type="text" name="nItem"></p>
        <p>Preço: <input type="text" name="nValor"></p>
        <p>Tipo de Item: 
            <?php echo carregaTiposItem();?>
        <p>Categoria: </p>
        </p>
        <p>Disponibilidade: <select name="nDisponibilidade">
                                <option value=""></option>
                                <option value="1">Disponível</option>
                                <option value="0">Indisponível</option>
                            </select>
        </p>
        <input type="submit" value="Adicionar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>