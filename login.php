<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../dist/css/style.css" rel="stylesheet" />

</head>
<body id="bodyLogin">

    <header class="header_section" id="barraTarefa">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="../index.php">
              <span>
                Feane
              </span>
            </a>
  
            
          </nav>
        </div>
      </header>


    <div class="container" id="containerLogin">
        <div class="info-box">
            <form id="form-login" action="../php/validation.php">

                <p>
                    <h1>Login</h1>
                    <input type="email" placeholder="Usuário" required />
                </p>
                <p>
                    <input type="password" placeholder="Senha" required />
                </p>
                <p> 
                    <input type="submit" value="Entrar">
                </p>

                <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
            </form>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
