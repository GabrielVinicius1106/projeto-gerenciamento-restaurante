<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

function carregaUsuario() {
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM usuario;";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $campo) {
            // Verifica o tipo de usuário e define o texto correspondente
            $tipoUsuario = '';
            switch ($campo['tipo_usuario_id_tipo_usuario']) {
                case 1:
                    $tipoUsuario = 'Admin';
                    break;
                case 2:
                    $tipoUsuario = 'Garçom';
                    break;
                case 3:
                    $tipoUsuario = 'Cozinheiro';
                    break;
                case 4:
                    $tipoUsuario = 'Copeiro';
                    break;
                case 5:
                    $tipoUsuario = 'Caixa';
                    break;
                default:
                    $tipoUsuario = 'Desconhecido';
            }

            $lista .= '<tr>'
                        . '<td>' .$campo['dados_pessoais'] . '</td>'
                        . '<td>' .$tipoUsuario. '</td>'
                        . '<td>' .$campo['user'] . '</td>'
                        . '<td>' .$campo['senha'] . '</td>'
                        . '<td><a href="php/excluirUsuario.php?id='.$campo['id_usuario'].'"><input type="button" value="Excluir"></a></td>'
                     .'</tr>';
        }
    }

    return $lista;
}

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


function carregaMesa($idTipoUsuario){
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM mesa;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            if ($campo['ativo'] > 0){
                $lista .= '<tr>'
                        .'<td>'.$campo['id_mesa'].'</td>'
                        .'<td>'.$campo['ocupacao'].' | '.$campo['capacidade'].'</td>';

                        if (($campo['ocupacao'] == 0 && $idTipoUsuario == 2) || ($campo['ocupacao'] == 0 && $idTipoUsuario == 1)){
                            $lista .= '<td><a href="opcoesmesa.php?id='.$campo['id_mesa'].'"><input type="button" value="Ocupar"></a></td>';
                        } else {
                            $lista .= '<td><p></p></td>';
                        }

                        if($idTipoUsuario == 1 && $campo['ocupacao'] == 0){
                            $lista .= '<td><input type="button" class="openModalBtn" data-id="'.$campo['id_mesa'].'" value="Editar Mesa"></td>';
                        } else {
                            $lista .= '<td><p></p></td>';
                        }

                        if($campo['ocupacao'] != 0){
                            $lista .= '<td><a href="pedidoMesa.php?id='.$campo['id_mesa'].'"><input type="button" value="Acessar Pedido"></a></td>';
                        } else {
                            $lista .= '<td></td>';
                        }

                        $lista .= '</tr>';
            }
        }
    }

    return $lista;
}

function carregaMesasInativas() {
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM mesa WHERE ativo = 0;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        foreach($result as $campo){
                $lista .= '<tr>'
                         .'<td>'.$campo['id_mesa'].'</td>'
                         .'<td>'.$campo['capacidade'].'</td>'
                         .'<td>'.$campo['ocupacao'].'</td>';

                        if ($campo['ativo'] == 0){
                            $lista .= '<td>Inativa</td>';
                        }
                        
                        if($_SESSION['idTipoUsuario'] == 1){
                            $lista .= '<td><a href="php/ativarMesa.php?idMesa='.$campo['id_mesa'].'"><input type="button" value="Ativar Mesa"><a></td>';
                        } else {
                            $lista .= '<td></td>';
                        }

                $lista .= '</tr>';
                        
            }
    }

    return $lista;
}

function carregaCardapio(){
    $idTipoUsuario = $_SESSION['idTipoUsuario'];

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
                        .'<td>'.$disponibilidade.'</td>';
            
            if($idTipoUsuario == 1){
                $lista .= '<td><a href="editarItem.php?id='.$campo['id_item'].'"><input type="button" value="Editar"></a></td>';
            } else {
                $lista .= '<td></td>';
            }
                
            $lista .= '</tr>';
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