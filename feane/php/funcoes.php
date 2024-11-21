<?php 

function novaMesa(){
$id = $_GET["id"];    

// Importa os arquivos que contém funções de tabelas e de conexão com o banco
include("conection.php");
include("funcoesPedido.php");

$lista = '';

    $sql = "UPDATE mesa SET id_mesa = id_mesa + 1 WHERE id_mesa = $id;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location: ../mesas.php"); 
return $lista;    

}

function carregaCapacidade($id){
    $lista = '';

    include("conection.php");

    $sql = "SELECT capacidade FROM mesa WHERE id_mesa = $id;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        //carrega as linhas
        foreach($result as $campo){
            $lista = $campo['capacidade'];
        }    
    }
    return $lista;
}


function carregaMesa(){
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM mesa;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $lista .= '<tr>'
                        .'<td>'.$campo['id_mesa'].'</td>'
                        .'<td>'.$campo['ocupacao'].' | '.$campo['capacidade'].'</td>'
                        .'<td><a href="opcoesmesa.php?id='.$campo['id_mesa'].'"><input type="button" value="Ocupar"></a></td>'
                        .'<td><input type="button" class="openModalBtn" data-id="'.$campo['id_mesa'].'" value="Editar"></td>'
                    .'</tr>';
        }
    }

    return $lista;
}


function carregaCardapio(){
    
    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM item;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            if ($campo['disponibilidade'] == 1){
                $disponibilidade = "Disponível";
            } else {
                $disponibilidade = "Indisponível";
            }

            $lista .= '<tr>'
                        .'<td>'.$campo['descricao_item'].'</td>'   
                        .'<td>'.$campo['valor_item'].'</td>'
                        .'<td>'.$disponibilidade.'</td>'
                        .'<td><a href="editarItem.php?id='.$campo['id_item'].'"><input type="button" value="Editar"></a></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaTiposItem(){

    $list = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT *
            FROM tipo_item;";
        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        foreach($result as $campo){
            $list .= "<option value='".$campo['id_tipo_item']."'>".$campo['descricao']."</option>";
        }

        return $list;
    }
}

function carregaValores($id, $informacao){

    $list = '';

    include('conection.php');

    $sql = "SELECT *
            FROM item
            WHERE id_item = ".$id.";";

        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        foreach ($result as $campo){
            
            if ($informacao == 'disponibilidade' && $campo[$informacao] == 1){
                $list = 'Disponível';
            } else if ($informacao == 'disponibilidade' && $campo[$informacao] == 0){
                $list = 'Indisponível';
            } else {
                $list = $campo[$informacao];
            }

            return $list;           
        }

    }
}

function getCategoria($id){

    include('conection.php');

    $sql = "SELECT categoria_id_categoria
            FROM tipo_item
            WHERE id_tipo_item = $id;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        foreach($result as $campo){

            $id_categoria = $campo['categoria_id_categoria'];

            include('conection.php');

            $sql = "SELECT descricao_categoria
                    FROM categoria
                    WHERE id_categoria = $id_categoria;";
            
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            if (mysqli_num_rows($result) > 0){
                foreach ($result as $campo){
                    $descricao_categoria = $campo['descricao_categoria']; 
                    return $descricao_categoria;
                }
            }

        }
    }

}

function carregaCategoria($id_item){

    $categoria = '';

    include('conection.php');

    $sql = "SELECT ca.descricao_categoria AS Descricao
            FROM item it 
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            INNER JOIN categoria ca
            ON ca.id_categoria = ti.categoria_id_categoria
            WHERE it.id_item = $id_item;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        foreach ($result as $campo) {
            $categoria = "&nbsp;&nbsp;".$campo['Descricao'];
        }
    }

    return $categoria;
}

function carregaDisponibilidade($id_item){

    $list = '';

    include('conection.php');

    $sql = "SELECT *
            FROM item
            WHERE id_item = $id_item";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach ($result as $campo){

            if ($campo['disponibilidade'] == 1){
                $list = '<input id="CheckBoxdisponibilidade" type="checkbox" name="nDisponibilidade" checked>';
            } else if ($campo['disponibilidade'] == 0){
                $list = '<input type="checkbox" name="nDisponibilidade">';
            }
        }
        return $list;   
    }

}   

function carregaTipoItem($id_tipo){

    $list = '';

    include('conection.php');

    $sql = "SELECT *
            FROM tipo_item
            WHERE id_tipo_item <> $id_tipo
            ORDER BY descricao;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach ($result as $campo){
            
            $list .= '<option value="'.$campo['id_tipo_item'].'">'.$campo['descricao'].'</option>';

        }
        return $list;   
    }
}

function descricaoTipoItem($id_item){

    $descricao = '';

    include('conection.php');

    $sql = "SELECT ti.descricao AS Descricao
            FROM item it 
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE it.id_item = $id_item;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        foreach ($result as $campo) {
            $descricao = $campo['Descricao'];
        }
    }

    return $descricao;
}

function idTipoItem($id_item){
    
    $id_tipo_item = '';

    include('conection.php');

    $sql = "SELECT ti.id_tipo_item AS ID
            FROM item it 
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE it.id_item = $id_item;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        foreach ($result as $campo) {
            $id_tipo_item = $campo['ID'];
        }
    }

    return $id_tipo_item;

}

function carregarItem($id){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM item
            WHERE id_item = $id;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega a linha do item
        foreach($result as $campo){

            if ($campo['disponibilidade'] == 1){
                $disponibilidade = "Disponível";
            } else {
                $disponibilidade = "Indisponível";
            }

            $lista .= '<p>ID Item: '.$campo['id_item'].'</p>'
                       .'<p>Valor:'.$campo['valor_item'].'</p>'
                       .'<p>Descrição:'.$campo['descricao_item'].'</p>'
                       .'<p>Disponibilidade:'.$disponibilidade.'</p>';
        }
    }

    return $lista;
}



?>