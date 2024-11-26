<?php
$dados = $_POST["nDados"];
$Cargo = $_POST["nCargo"];       
include("conection.php");



    $sql = "INSERT INTO usuario (dados_pessoais, tipo_usuario_id_tipo_usuario)
            VALUES ('".$dados."', $Cargo);";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);

header('location: ../usuarios.php');
?>