<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial Admin</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap');

        h1 {
            color: #f0f0f0;
            font-family: 'Dancing Script', cursive;
            font-size: 70px;
        }

        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        #bodytelainicial {
            margin: 0;
            margin-bottom: 50px;
            height: 100vh;
            background-color: #79aeff;
            justify-content: center;
            align-items: center;
            display: grid;
            place-items: center;
            animation: animarGradiente 7s infinite alternate;
            background: linear-gradient(90deg, rgb(33, 49, 65), rgb(65, 76, 95), rgb(86, 107, 148));
            background-size: 300% 100%;
        }

        @keyframes animarGradiente {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .btn-large {
            width: 100%;
            height: 200px;
            font-size: 30px;
            margin: 10px 0;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 10px;
            box-shadow: 5px 5px 0px rgba(0, 0, 0, 0.3);
        }

        .btn-large:hover {
            background-color: #333;
            border-color: #333;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-item {
            flex: 1 1 calc(33.33% - 10px);
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: white;
        }

        /* Estilo do alerta */
        .alert-box {
            position: fixed;
            top:10%;
            left: 50%;
            transform: translateX(-50%);
            background-color: black;
            padding: 80px;
            padding-bottom: 90px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
            font-family: 'Open Sans', sans-serif;
            text-align: left;            
            width: 80%;
            max-width: 800px;
            font-size: 18px;
            color: white;
            z-index: 1000;
            animation: fadeIn 1s ease-out;
        }

        .alert-content {
            display: flex; /* Flexbox para alinhamento horizontal */
            align-items: center; /* Alinha a imagem e o texto verticalmente */
            gap: 15px; /* Espaço entre a imagem e o texto */
        }

        .alert-img {
            max-width: 30%; 
            height: auto;
            border-radius: 10px;
        }
        .alert-text {
            display: flex;
            text-align: center;
            flex-direction: column; /* Alinha o texto em coluna */
            gap: 10px; /* Espaço entre as linhas de texto */
            flex: 1; /* Faz o texto ocupar o espaço restante */
        }

        .alert-content p {
            flex: 1; /* Faz o texto ocupar o espaço restante */
            margin: 0; /* Remove margens padrão do texto */
        }

        .alert-box button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .alert-box button:hover {
            background-color: #555;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

    </style>
</head>
<body id="bodytelainicial">

    <!-- Alerta criativo -->
    <div id="alert-box" class="alert-box">
        <div class="alert-content">
            <img src="dist/images/about-img.png" class="alert-img">
            <div class="alert-text">
                <h2>Bem-vindo ao Delivery!</h2>
                <p>Estamos muito felizes de te ver</p>
                <p> aqui! Aproveite as nossas Ofertas!</p>
                <button id="close-alert">Fechar</button>
            </div>
        </div>
    </div>

    <h1>Site</h1>
    <section class="slider_section">
        <div class="container1">
            <div class="button-container">
                <div class="btn-item">
                    <button id="btn1" class="btn btn-large"><a href="mesas.php">Mesas</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn2" class="btn btn-large"><a href="pedidos.php">Pedidos</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn3" class="btn btn-large"><a href="cardapio.php">Cardápio</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn4" class="btn btn-large">Caixa</button>
                </div>
                <div class="btn-item">
                    <button id="btn5" class="btn btn-large">Usuários</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Exibe o alerta na tela
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('alert-box').style.display = 'block';
            }, 500);  // Espera meio segundo antes de mostrar o alerta
        };

        // Fecha o alerta quando o botão é clicado
        document.getElementById('close-alert').onclick = function() {
            document.getElementById('alert-box').style.display = 'none';
        };
    </script>

</body>
</html>
