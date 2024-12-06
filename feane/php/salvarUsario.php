

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;

    /* Adiciona a imagem de fundo */
    background-image: url('desculpa'); /* Substitua 'sua-imagem.jpg' pelo caminho da sua imagem */

    /* Configurações para a imagem */
    background-size: cover; /* Faz com que a imagem cubra todo o fundo */
    background-position: center; /* Centraliza a imagem */
    background-repeat: no-repeat; /* Impede que a imagem se repita */
    background-attachment: fixed; /* Faz com que a imagem fique fixa ao rolar a página */
    color: #fff; /* Ajusta a cor do texto para melhor contraste */
}

</style>
<body>

</body>
</html>

<?php
    $dados = $_POST["nDados"];
    $Cargo = $_POST["nCargo"];  
    $Login = $_POST["nLogin"];
    $Senha = $_POST["nSenha"];       
    include("conection.php");


    $sql_check = "SELECT COUNT(*) AS total FROM usuario WHERE user = '$Login'";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check) {
        $row = mysqli_fetch_assoc($result_check);
        if ($row['total'] > 0) {
            // Login já existe
            mysqli_close($conn);
            echo "<script>
                    alert('Erro: Este login já está em uso.');
                    window.location.href = '../usuarios.php';
                </script>";
            exit();
        }
    } 

    // Inserir o novo usuário no banco
    $sql = "INSERT INTO usuario (dados_pessoais, tipo_usuario_id_tipo_usuario, user, senha)
                VALUES ('$dados', $Cargo, '$Login', $Senha)";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header('location: ../usuarios.php');
       
    
?>