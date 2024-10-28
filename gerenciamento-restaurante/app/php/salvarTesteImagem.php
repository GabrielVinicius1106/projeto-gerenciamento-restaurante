<?php 

// var_dump($_FILES["nFoto"]["tmp_name"]);
// die();

if($_FILES["nFoto"]["tmp_name"] != ""){
    // Grava a extensão do arquivo selecionado
    $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
    
    // var_dump($_FILES['nFoto']['name']);
    // Adiciona novo nome pro arquivo "criptografado"
    $novoNome = md5($_FILES['nFoto']['name']).'.'.$extensao;

    // var_dump($extensao, $novoNome);
    // die();
    if(is_dir('../dist/img/teste')){
        //Existe
        $diretorio = '../dist/img/teste/';
    }else{
        //Criar pq não existe
        $diretorio = mkdir('../dist/img/teste/');
    }
    // Cria uma cópia do arquivo na pasta 'teste' 
    move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio.$novoNome);

    //Caminho que será salvo no banco de dados
    $dirImagem = 'dist/img/teste/'.$novoNome;

    // Cria a conexão
    include("conexao.php");
        //UPDATE
        // var_dump($idUsuario);
        // die();
        $sql = "UPDATE usuarios "
                ." SET Foto = '".$dirImagem."' "
                ." WHERE idUsuario = 4;";

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
}

?>