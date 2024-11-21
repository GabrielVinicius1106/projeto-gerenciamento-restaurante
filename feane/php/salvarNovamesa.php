<?php
$ocpPadrao = 0;
$cap = $_POST["nCap"];       
include("conection.php");


    $sql = "INSERT INTO mesa (capacidade, ocupacao)
            VALUES ($cap, $ocpPadrao);";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);

header('location: ../mesas.php');
    

?>
