<?php
$id = $_GET["id"];
$ocp = $_POST["nInput"];

include("conection.php");
include("funcoes.php");

$capacidade = carregaCapacidade($id);
if ($ocp > $capacidade) {
    // Exibindo a mensagem de alerta e redirecionando para a página correta
    echo "<script>
        alert('Ocupação maior que capacidade da mesa!');
        window.location.href = '../opcoesmesa.php?id=$id';
    </script>";
    exit; // Interrompe o script após enviar a resposta
}
$sql = "UPDATE mesa SET ocupacao = $ocp WHERE id_mesa = $id;";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: ../mesas.php");   


?>

    