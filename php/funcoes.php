<?php 
function carregamesas(){
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM mesa;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        //carrega as linhas
        foreach($result as $campo){
            $lista .= '<tr>'
                        .'<td>'.$campo['id_mesa'].'</td>'
                        .'<td>'.$campo['capacidade'].'</td>'
                        .'<td><input type="checkbox"></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

?>