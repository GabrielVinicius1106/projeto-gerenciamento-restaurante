<?php 

$id = $_GET['id'];
$nomeItem = $_POST['nItem'];
$valorItem = $_POST['nValor'];
$categoriaItem = $_POST['nCategoria'];
$disponibilidadeItem = $_POST['nDisponibilidade'];

// var_dump($id, $nomeItem, $valorItem, $categoriaItem, $disponibilidadeItem);
// die();

if ($id == 'insert'){
    //Insert
    $sql = "INSERT INTO item (valor_item, descricao_item, disponibilidade, tipo_item_id_tipo_item)
            VALUES (
                ".$valorItem.",
                '".$nomeItem."',
                ".$disponibilidadeItem.",
                ".$categoriaItem."
            );";
    // var_dump($sql);
    // die();
} else if ($id == 'update'){
    // Update
} else if ($id = 'delete'){
    // Delete
}

include('conection.php');

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: ../cardapio.php");

?>