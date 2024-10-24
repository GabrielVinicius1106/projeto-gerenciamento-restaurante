<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include("funcoes.php");

$_SESSION['logado'] = 0;

$login = $_POST["nUsuario"];
$senha = $_POST["nSenha"];

//$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
//$_GET - Valor enviado pelo FORM através da URL
//$_SESSION - Variável criada pelo usuário no PHP

include("conection.php");

$sql = "SELECT * FROM usuario "
        ." WHERE login = '$login'"
        ." AND senha = 12345;";

$resultLogin = mysqli_query($conn,$sql);
mysqli_close($conn);


//Validar se tem retorno do BD
if (mysqli_num_rows($resultLogin) > 0) {  
        
    //enviarLogin('destino@email.com.br','Mensagem de e-mail para SA','Teste SA','Eu mesmo');

    foreach ($resultLogin as $coluna) {
                    
        //***Verificar os dados da consulta SQL
        $_SESSION['idTipoUsuario'] = $coluna['tipo_usuario_id_tipo_usuario'];
        $_SESSION['logado']        = 1;
        $_SESSION['idLogin']       = $coluna['id_usuario'];
        $_SESSION['NomeLogin']     = $coluna['login'];
        $_SESSION['FotoLogin']     = $coluna['Foto'];
        $_SESSION['DadosPessoais'] = $coluna['dados_pessoais'];

        //Acessar a tela inicial
        header('location: ../telainicial.php');
    }        
}else{
    //Acessar a tela inicial
    header('location: ../login.php');
} 


?>