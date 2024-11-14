<?php 

$operacao = $_GET['operacao'];
$id = $_GET['id'];
$nomeItem = $_POST['nItem'];
$valorItem = (string)$_POST['nValor'];
$idTipoItem = $_POST['nTipo'];
$disponibilidadeItem = $_POST['nDisponibilidade'];

// Validação se há vírgula no valor de item informado
if (str_contains($valorItem, ',') && $operacao == 'insert'){
    header('location: ../adicionarItem.php');
} else if (str_contains($valorItem, ',') && $operacao == 'update'){
    header('location: ../editarItem.php');
} else if(!str_contains($valorItem, ',')){
       
}

// Confere se a disponibilidade foi marcada ou não
if ($disponibilidadeItem == 'on'){
    $disponibilidadeItem = 1;
} else {
    $disponibilidadeItem = 0;
}

// var_dump($operacao, $id, $nomeItem, $valorItem, $idTipoItem, $disponibilidadeItem);
// die();

if ($operacao == 'insert'){
    //Insert
    $sql = "INSERT INTO item (valor_item, descricao_item, disponibilidade, tipo_item_id_tipo_item)
            VALUES (
                ".$valorItem.",
                '".$nomeItem."',
                ".$disponibilidadeItem.",
                ".$idTipoItem.");";
} else if ($operacao == 'update'){
    // Update

    $sql = "UPDATE item
            SET valor_item = $valorItem, descricao_item = '$nomeItem', disponibilidade = $disponibilidadeItem, tipo_item_id_tipo_item = $idTipoItem
            WHERE id_item = $id;";

} else if ($operacao == 'delete'){
    // Delete
    $sql = "DELETE FROM item
            WHERE id_item = $id;";
}

include('conection.php');

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: ../cardapio.php");

?>