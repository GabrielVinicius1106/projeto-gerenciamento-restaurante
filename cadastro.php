<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
     
    <!-- Custom styles for this template -->
    <link href="dist/css/style.css" rel="stylesheet" />

</head>
<body id="bodyCadastro">
    <!-- Tela de Cadastro -->
    <div class="form-container sign-up-container" id="containerLogin">
        <form id="form-signup" class="info-box" action="php/cadastraUsuario.php">
            <p>
                <h1>Criar Conta</h1>
            </p>
            <p>
                <input type="text" placeholder="Usuário" required/>
            </p>
            <p>
                <input type="password" placeholder="Senha" required/>
            </p>
            <p>
                <input type="text" placeholder="Dados Pessoais" required/>
            </p>
            <input type="submit">Cadastrar</input>
        </form>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
