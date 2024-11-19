<?php 

function carregaItens(){

    $list = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * FROM item;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        
        //Carrega as linhas
        foreach($result as $campo){
            $list .= "<option value='".$campo['id_item']."'>".$campo['descricao_item']."</option>";
        }    
    }
    return $list;

}

function carregaPedidosEmAndamento(){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM pedido
            WHERE status_pedido = 'Em andamento';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            $lista .= '<tr>'
                        .'<td>'.$campo['id_pedido'].'</td>'   
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>'
                        .'<td><a href="solicitarItens.php?id='.$campo['id_pedido'].'"><input type="button" value="Solicitar Itens"></a></td>'
                        .'<td><a href="editarPedido.php?id='.$campo['id_pedido'].'"><input type="button" value="Editar"></a></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaPedidosFechados(){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM pedido
            WHERE status_pedido = 'Fechado';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            $lista .= '<tr>'
                        .'<td>'.$campo['id_pedido'].'</td>'   
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>'
                        .'<td><a href="editarPedido.php?id='.$campo['id_pedido'].'"><input type="button" value="Editar"></a></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaMesas(){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM mesa;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            $lista .= '<tr>'
                        .'<td>'.$campo['id_pedido'].'</td>'   
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>'
                        .'<td><a href="editarPedido.php?id='.$campo['id_pedido'].'"><input type="button" value="Editar"></a></td>'
                    .'</tr>';
        }
    }

    return $lista;

}

?>