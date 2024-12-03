<?php
$ocpPadrao = 0;
$cap = $_POST["nCap"];       
include("conection.php");


    $sql = "INSERT INTO mesa (capacidade, ocupacao, ativo)
            VALUES ($cap, $ocpPadrao, 1);";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);

header('location: ../mesas.php');
    

?>
