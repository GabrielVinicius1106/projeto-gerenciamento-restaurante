<?php 

include('php/funcoes.php');

?>

<!DOCTYPE html>
<html lang="en">
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
<<<<<<< HEAD
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
=======
    <div class="container" id="additem">
        <form action="php/crudItem.php?id=insert" method="POST">
            <p>Descrição: <input type="text" name="nItem"></p>
            <p>Preço: <input type="text" name="nValor"></p>
            <p>Tipo de Item: 
                <?php echo carregaCategorias();?>
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
    </div>
>>>>>>> 836657f4008879aa132c5cc11ccc597f66724e5b
</body>
</html>