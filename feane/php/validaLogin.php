<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include("funcoes.php");

$_SESSION['logado'] = 1;

$login = $_POST["nUsuario"];
$senha = $_POST["nSenha"];

//$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
//$_GET - Valor enviado pelo FORM através da URL
//$_SESSION - Variável criada pelo usuário no PHP

include("conection.php");

$sql = "SELECT * FROM usuario "
        ." WHERE login = '$login'"
        ." AND senha = $senha;";

$resultLogin = mysqli_query($conn,$sql);
mysqli_close($conn);


//Validar se tem retorno do BD
if (mysqli_num_rows($resultLogin) > 0) {  
        
    //enviarLogin('destino@email.com.br','Mensagem de e-mail para SA','Teste SA','Eu mesmo');

    foreach ($resultLogin as $coluna) {
        
        // Armazena o tipo de usuário em uma variável de SESSÃO
        $_SESSION['idTipoUsuario'] = $coluna['tipo_usuario_id_tipo_usuario'];

        //***Verificar os dados da consulta SQL
        // $_SESSION['idTipoUsuario'] = $coluna['tipo_usuario_id_tipo_usuario'];
        // $_SESSION['logado']        = 1;
        // $_SESSION['idLogin']       = $coluna['id_usuario'];
        // $_SESSION['NomeLogin']     = $coluna['login'];
        // $_SESSION['FotoLogin']     = $coluna['Foto'];
        // $_SESSION['DadosPessoais'] = $coluna['dados_pessoais'];

        //Acessar a tela inicial
        // if ($_SESSION['idTipoUsuario'] == 1){
        //     // Administrador
        //     header('location: ../telainicialAdmin.php');
        // } else if ($_SESSION['idTipoUsuario'] == 2){
        //     // Garçom
        //     header('location: ../telainicialGarçom.php');
        // } else if ($_SESSION['idTipoUsuario'] == 3){
        //     // Cozinha
        //     header('location: ../telainicialCozinha.php');
        // } else if ()
        switch($_SESSION['idTipoUsuario']){
            case 1:
                header('location: ../telainicialAdmin.php');
                break;
            case 2:
                header('location: ../telainicialGarcom.php');
                break;
            case 3:
                header('location: ../telainicialCozinha.php');
                break;
            case 4:
                header('location: ../telainicialCopa.php');
                break;
            case 5:
                header('location: ../telainicialCaixa.php');
                break;
            default:
                header('location: ../login.php');
                break;
        }
        
    }        

} else{
    //Acessar a tela inicial
    header('location: ../login.php');
} 


?>