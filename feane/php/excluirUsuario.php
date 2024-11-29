<?php
    $id = $_GET['id'];
    include("conection.php");
    include("funcoes.php");
    

    $sql = "DELETE FROM usuario WHERE id_usuario = $id;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

 header("location: ../usuarios.php");

?>


