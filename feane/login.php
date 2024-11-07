<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>

    <!-- Custom styles for this template -->
    <link href="dist/css/elisson.css" rel="stylesheet" />
</head>
<body id="bodyLogin">

<h1>Site</h1>

    <div class="container1" id="containerLogin">
        <div class="info-box">
            <form id="form-login" action="php/validaLogin.php" method="POST" >

                <p>
                    <h2>Login</h2>
                    <input type="text" placeholder="Usuário" name="nUsuario" required />
                </p>
                <p>
                    <input type="password" placeholder="Senha" name="nSenha" required />
                </p>
                <p> 
                    <input type="submit" value="Entrar">
                </p>
            </form>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
