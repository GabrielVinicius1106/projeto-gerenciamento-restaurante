<?php
    include('global.php');
    $id = $_GET['id'];
    
    include("conection.php");
    
    $sql = "DELETE FROM usuario WHERE id_usuario = $id;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

 header("location: ../usuarios.php");

?>


