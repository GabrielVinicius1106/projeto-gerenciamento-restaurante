<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="dist/css/style.css" rel="stylesheet" />

    <style>
        /* Estilos para os botões grandes */
        .btn-large {
            width: 100%;
            height: 150px;
            font-size: 24px;
            margin: 10px 0;
            background-color: white;
            color: black;
            border: 1px solid #ccc; /* Adiciona uma borda leve */
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-large:hover {
            background-color: #f0f0f0;
        }

        /* Container flexível para os botões */
        .button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Ajuste para manter a responsividade nos tamanhos menores */
        .btn-item {
            flex: 1 1 calc(33.33% - 10px); /* 3 botões por linha */
        }

        @media (max-width: 768px) {
            .btn-item {
                flex: 1 1 calc(50% - 10px); /* 2 botões por linha em telas menores */
            }

            .btn-large {
                height: 100px;
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .btn-item {
                flex: 1 1 100%; /* 1 botão por linha em telas muito pequenas */
            }
        }
    </style>
</head>
<body id="bodyLogin">

  <header class="header_section" id="barraTarefa">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Daniel
          </span>
        </a>
      </nav>
    </div>
  </header>

    <div class="container">
        <div class="button-container">
            <div class="btn-item">
                <button class="btn btn-large">Mesas</button>
            </div>
            <div class="btn-item">
                <button class="btn btn-large">Pedidos</button>
            </div>
            <div class="btn-item">
                <button class="btn btn-large">Cardapio</button>
            </div>
            <div class="btn-item">
                <button class="btn btn-large">Botão 4</button>
            </div>
            <div class="btn-item">
                <button class="btn btn-large">Botão 5</button>
            </div>
            <div class="btn-item">
                <button class="btn btn-large">Botão 6</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
