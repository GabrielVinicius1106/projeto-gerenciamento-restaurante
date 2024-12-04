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