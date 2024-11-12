

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Mesas</title>
    <?php
    include("php/conection.php");
    include("php/funcoes.php");
    $id1 = $_GET['id'];
    ?>

</head>
<body>
    <form action="php/salvarmesa.php?id=<?php echo $_GET["id"];?>" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Mesa <?php echo $id1 ?></h1>
    <p>Ocupação: <input type="number" name="nOcp" required></p>
    <p><input type="submit" value="Salvar"></p>
    </form>
</body>
</html>