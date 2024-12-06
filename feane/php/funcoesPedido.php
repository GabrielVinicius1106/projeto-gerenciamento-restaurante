<?php 

function carregaItensCardapio(){

    $list = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * FROM item WHERE disponibilidade = 1;";
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
                    .'</tr>';
        }
    }

    return $lista;
}

function getIdMesa($idPedido){
    
    $add = '';

    $sql = "SELECT mesa_id_mesa FROM pedido WHERE id_pedido = $idPedido;";

    include('conection.php');
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){
        foreach($result as $campo){
            $add = '<td>'.$campo['mesa_id_mesa'].'</td>';
        }
    }
    return $add;
}

function carregaPedidosItemCozinha(){
    $list = '';

    $sql =  "SELECT *
            FROM pedido_item pi
            INNER JOIN pedido pd
            ON pd.id_pedido = pi.pedido_id_pedido
            INNER JOIN item it
            ON it.id_item = pi.item_id_item
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE ti.categoria_id_categoria = 1
            AND pi.status_pedido_item = 'Preparando...'
            AND pd.status_pedido = 'Em andamento'
            ORDER BY pi.hora_pedido_item ASC;";
            
    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // var_dump($result);
    // die();

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['id_pedido_item'].'</td>';

            $list .= getDescricaoItem($campo['item_id_item']);

            $list .=  '<td>'.$campo['obs_item'].'</td>';

            $list .= getIdMesa($campo['pedido_id_pedido']);

            $list .= '<td>'.$campo['pedido_id_pedido'].'</td>'
                    .'<td>'.$campo['item_id_item'].'</td>'
                    .'<td>'.$campo['status_pedido_item'].'</td>'
                    .'<td><a href="php/concluirPedidoItem.php?idPedidoItem='.$campo['id_pedido_item'].'&origem=cozinha"><button type="button" id="id-marcar-concluido"><i class="fa-solid fa-square-check fa-2xl" style="color: #327bb3;"></i></button></a></td>'
                .'</tr>';
        }
    } else {
        $list = '<script>alert("Não há pedidos de itens da Cozinha!")</script>';
    }

    return $list;
}

function carregaPedidosItemCopa(){
    $list = '';

    $sql =  "SELECT *
            FROM pedido_item pi
            INNER JOIN pedido pd
            ON pd.id_pedido = pi.pedido_id_pedido
            INNER JOIN item it
            ON it.id_item = pi.item_id_item
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE ti.categoria_id_categoria = 2
            AND pi.status_pedido_item = 'Preparando...'
            AND pd.status_pedido = 'Em andamento'
            ORDER BY pi.hora_pedido_item ASC;";
            
    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['id_pedido_item'].'</td>';

            $list .= getDescricaoItem($campo['item_id_item']);

            $list .=  '<td>'.$campo['obs_item'].'</td>';

            $list .= getIdMesa($campo['pedido_id_pedido']);

            $list .=   '<td>'.$campo['pedido_id_pedido'].'</td>'
                      .'<td>'.$campo['item_id_item'].'</td>'
                      .'<td>'.$campo['status_pedido_item'].'</td>'
                      .'<td><a href="php/concluirPedidoItem.php?idPedidoItem='.$campo['id_pedido_item'].'&origem=copa"><button type="button" id="id-marcar-concluido"><i class="fa-solid fa-square-check fa-2xl" style="color: #327bb3;"></i></button></a></td>'
                    .'</tr>';
        }
    } else {
        $list = '<script>alert("Não há pedidos de itens da Copa!")</script>';
    }

    return $list;
}

function carregaMesas(){

    $lista = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * 
            FROM mesa;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas da tabela mesas
        foreach($result as $campo){

            $lista .= '<option value="'.$campo['id_mesa'].'">Mesa &nbsp;'.$campo['id_mesa'].'</option>';
        }
    }

    return $lista;
}

function carregaPedido($idMesa){
    
    include('conection.php');

    $list = '';

    $sql = "SELECT * FROM pedido WHERE mesa_id_mesa = $idMesa
            AND status_pedido = 'Em andamento';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $campo){
            $list .= '<tr>'
                    .'<td>'.$campo['id_pedido'].'</td>'
                    .'<td>'.$campo['status_pedido'].'</td>'
                    .'<td>'.$campo['quantidade_pessoas'].'</td>'
                    .'<td>'.$campo['data_pedido'].'</td>'
                    .'<td>'.$campo['mesa_id_mesa'].'</td>'
                    .'</tr>';
        }
    }

    return $list;
}

function getDescricaoItem($idItem){

    $add = '';

    include('conection.php');

    $sql = "SELECT descricao_item FROM item WHERE id_item = $idItem;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result)){
        foreach($result as $campo){
            $add = '<td>'.$campo['descricao_item'].'</td>'; 
        }
    }

    return $add;

}

function carregaItensPedido($idPedido){

    $list = '';

    include('conection.php');

    $sql = "SELECT * FROM pedido_item WHERE pedido_id_pedido = $idPedido;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        $list = '<h1>ITENS</h1>
             <tr>
                <th>Item</th>
                <th>Quantidade de Itens</th>
                <th>Observação</th>
                <th>ID do Item</th>
                <th>Status do Item</th>
             </tr>';
        foreach ($result as $campo){

            $list .= '<tr>';
            
            $list .= getDescricaoItem($campo['item_id_item']);
            
            $list .= '<td>'.$campo['quantidade_itens'].'</td>'
                    .'<td>'.$campo['obs_item'].'</td>'
                    .'<td>'.$campo['item_id_item'].'</td>'
                    .'<td>'.$campo['status_pedido_item'].'</td>'
                    .'</tr>';
        }
    }

    return $list;


}

function getIdPedido($idMesa){

    include('conection.php');

    $idPedido = 0;

    $sql = "SELECT id_pedido FROM pedido WHERE mesa_id_mesa = $idMesa";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){

        foreach($result as $campo){
            $idPedido = $campo['id_pedido'];
        }
    }

    return $idPedido;

}

function criarPedido($idMesa, $ocp){

    include('conection.php');

    $sql = "SELECT * FROM pedido WHERE mesa_id_mesa = $idMesa";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) >= 0){

        include('conection.php');

        $sql = "INSERT INTO pedido 
            (`status_pedido`, `quantidade_pessoas`, `data_pedido`, `mesa_id_mesa`) 
            VALUES ( 
                'Em andamento', 
                '".$ocp."', 
                '".date('Y-m-d')."', 
                '".$idMesa."');";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
}

function getPedidoItens($idPedido){
    $list = 0;

    $sql = "SELECT * FROM pedido_item WHERE pedido_id_pedido = $idPedido;";

    include('conection.php');
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){
        return 1;
    } else {
        return 0;
    }
}

function carregaPedidos(){

    $list = '';

    $sql = "SELECT * FROM pedido;";

    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){

        // Retorna 1 se HAVER PEDIDO DE ITENS e 0 se NÃO HOUVER
        // $existePedidoItens = getPedidoItens($idPedido);

        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['id_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>';
            
            $existePedidoItens = getPedidoItens($campo['id_pedido']);
            // var_dump($existePedidoItens);
            // die();

            if($campo['status_pedido'] == 'Fechado' && $existePedidoItens == 1){
                $list .= '<td><a href="efetuarPagamento.php?idPedido='.$campo['id_pedido'].'"><button type="button">Efetuar Pagamento</button></a></td>';
            } else if($campo['status_pedido'] == 'Fechado' && $existePedidoItens == 0){
                $list .= '<td>Não há Itens</td>';
            } else {
                $list .= '<td>Pedido em Andamento</td>';
            }

            $list .= '</tr>';
        }
    }

    return $list;

}

function carregaPedidoFechamento($idPedido){

    $list = '';

    $sql_pedido = "SELECT * FROM pedido WHERE id_pedido = $idPedido;";

    include('conection.php');
    $result_pedido = mysqli_query($conn, $sql_pedido);
    mysqli_close($conn);

    if(mysqli_num_rows($result_pedido)){

        foreach($result_pedido as $campo){
            $list .=  '<td>'.$campo['id_pedido'].'</td>'
                     .'<td>'.$campo['status_pedido'].'</td>'
                     .'<td>'.$campo['quantidade_pessoas'].'</td>'
                     .'<td>'.$campo['data_pedido'].'</td>'
                     .'<td>'.$campo['mesa_id_mesa'].'</td>';
        }

    }

    return $list;

}

function getValorUnitario($idItem){
    $valorUnitario = '';

    $sql = "SELECT valor_item FROM item WHERE id_item = $idItem;";

    include('conection.php');
    $result_item = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result_item)){
        foreach($result_item as $campo){
            $valorUnitario = $campo['valor_item'];
        }
    }

    return $valorUnitario;
}

function getItem($idItem){
    $item = '';

    $sql = "SELECT descricao_item FROM item WHERE id_item = $idItem;";

    include('conection.php');
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){
        foreach($result as $campo){
            $item .= $campo['descricao_item'];
        }

        return $item;
    }
}

function carregaItensFechamento($idPedido){

    $list = '';

    $sql_pedido_itens = "SELECT * FROM pedido_item WHERE pedido_id_pedido = $idPedido;";

    include('conection.php');
    $result_pedido_itens = mysqli_query($conn, $sql_pedido_itens);
    mysqli_close($conn);

    if(mysqli_num_rows($result_pedido_itens)){
        foreach($result_pedido_itens as $campo){
            $item = getItem($campo['item_id_item']);
            $qntdItens = $campo['quantidade_itens'];
            $valorUnitario = getValorUnitario($campo['item_id_item']);
            $subtotal = $valorUnitario * $qntdItens;
            $valorTotal += $subtotal;

            $list .= '<tr>'
                    .'<td>'.$item.'</td>'
                    .'<td>'.$qntdItens.'</td>'
                    .'<td>'.$valorUnitario.'&nbsp</td>'
                    .'<td>'.$subtotal.'&nbsp</td>'
                    .'</tr>';
        }

        $list .= '<tr>'
                    .'<td><strong>Valor Total: </strong></td>'
                    .'<td colspan="3"><strong>'.$valorTotal.'&nbsp;R$</strong></td>'
                .'</tr>';
    }
    
    return $list;
}

?>