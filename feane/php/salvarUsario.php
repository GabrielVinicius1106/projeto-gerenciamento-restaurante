<?php
$dados = $_POST["nDados"];
$Cargo = $_POST["nCargo"];  
$Login = $_POST["nLogin"];
$Senha = $_POST["nSenha"];       
include("conection.php");

    //Validar se o login ja extie no banco de dados (if)

    $sql = "INSERT INTO usuario (dados_pessoais, tipo_usuario_id_tipo_usuario, user,senha)
            VALUES ('".$dados."', $Cargo, '".$Login."', $Senha);";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);

header('location: ../usuarios.php');
?>