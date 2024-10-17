<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

</head>
<body id="bodyLogin">

    <header class="header_section" id="barraTarefa">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                Feane
              </span>
            </a>
  
            
          </nav>
        </div>
      </header>


    <div class="container" id="containerLogin">
        <div class="info-box">
            <form id="form-login">

                <p>
                    <h1>Login</h1>
                    <input type="email" placeholder="Email" required />
                </p>
                <p>
                    <input type="password" placeholder="Senha" required />
                </p>
                <p>
                    <button>Entrar</button>
                </p>

                <p>Não tem conta? <a href="cadastro.html">Cadastre-se</a></p>
            </form>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
