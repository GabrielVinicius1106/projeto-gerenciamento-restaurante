<?php 

include('funcoesItem.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cárdapio | Adicionar Item</title>

    <link rel="stylesheet" href="dist/css/global.css">

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Adicionar Item</h1>
    <form action="php/funcoesItem.php?id=insert" method="POST">
        <p>Nome: <input type="text" name="nItem"></p>
        <p>Preço: <input type="number" name="nValor"></p>
        <!-- <p>Categoria: <select name="nCategoria" id="">
                        <option value=""></option>
                        <option value="Comida">Pizza</option>
                        <option value="Bebida">Sobremesa</option>
                      </select> -->
        </p>
        <p>Disponibilidade: <select name="nDisponibilidade" id="">
                                <option value="0"></option>
                                <option value="S">Disponível</option>
                                <option value="N">Indisponível</option>
                            </select>
        </p>
        <input type="submit" value="Adicionar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>