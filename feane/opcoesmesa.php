<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções | Mesa</title>
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    
    <?php
    include("php/conection.php");
    include("php/funcoes.php");
    $id1 = $_GET['id'];
    ?>

</head>
<body>


<a href="telainicial.php">Voltar</a>
    <h1>Mesa <?php echo $id1 ?></h1>
        <div class="container" id="additem">
            <p class="p2">Quantidade de pessoas :  <input type="number" name="nV1">
            <p><input type="button" value="Salvar"></p>                
            </p>
        </div>
</body>
</html>
