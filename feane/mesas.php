<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>

    <link rel="stylesheet" type="text/css" href="dist/css/global.css" />
    <style>
        body {
            background-color: black;
            color: white;
            
        }

        a {
            color: #00bfff;
            text-decoration: none;
        }

        a:hover {
          text-decoration: underline;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            background-image: url('amadeirado.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #555;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8); /* Adding a semi-transparent background to make text readable */
        }

        th {
            background-color: rgba(51, 51, 51, 0.9);
        }

        tr:nth-child(even) {
            background-color: rgba(34, 34, 34, 0.9);
        }

        tr:hover {
            background-color: rgba(68, 68, 68, 0.9);
        }
    </style>
</head>
<body>
    <?php
     include("php/funcoes.php");
    ?>
    <a href="telainicial.php">Voltar</a>
    <h1>Mesas</h1>
    <table> 
      <tr>
         <th>Nr Mesa</th>
         <th>Capacidade</th>
         <th>Ocupado</th>
         <th>Editar</th>
      </tr>
      <?php 
         echo carregaMesa();
      ?>
   </table>
</body>
</html>
