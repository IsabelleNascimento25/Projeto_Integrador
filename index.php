<?php
include 'includes/db_connection.php'; // Atualizado para o novo caminho
echo "Conexão realizada com sucesso!";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ProsperaTree</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/inicial0.css" />
    <link rel="icon" href="../imagens/icone.ico" type="image/x-icon" />
    <script src="../main.js"></script>
    <link rel="stylesheet" href="css/home.css"> <!-- Adicionando o CSS aqui -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
            background-image: url("../Projeto_Integrador/img/inicio0.png");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .start-button {
            text-align: center;
        }

        .start-button button {
            font-size: 1.25rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #FFC436;
            color: white;
            cursor: pointer;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        button {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 15%;
        }

        @media only screen and (max-width: 768px) {
            .start-button button {
                width: 30%;
            }
            img {
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <img src="../imagens/logofull.jpg" alt="logo completa" class="imagem" />
    <div class="start-button">
    <a href="login-cad/login.html"><button>Entrar</button></a>
</div>

</body>
</html>
