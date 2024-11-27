<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuario | Usuarios</title>
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />
    
    <?php
    include("php/conection.php");
    include("php/funcoes.php");
    ?>

</head>
<body>

<form action="php/salvarUsario.php" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Adicionar Usuario <?php //echo $id1 ?></h1>
        <div class="container" id="additem">
        <p >Dados pessoais:  <input  name="nDados" type="text">
        <p >Tipo de cargo:  <input type="number" name="nCargo">
        <p >Login:  <input  name="nLogin" type="text">
        <p >Senha:  <input type="number" name="nSenha">
            <p><input type="submit" value="Salvar"></p>
                            
        </div>
</form>

</body>
</html>