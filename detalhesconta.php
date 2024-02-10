<?php
    // Conexão com o banco de dados
    $servername = "sql105.infinityfree.com";
    $username = "if0_35794528";
    $password = "ZxLv63t600VNqgR";
    $dbname = "if0_35794528_wolfshild";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Iniciar a sessão
    session_start();

    // Verificar se o usuário está logado
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Consultar os dados da conta do usuário logado
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['imagem'] = $row['imagem'];
        } else {
            echo "<p class='not-logged-in'>Nenhum usuário encontrado.</p>";
        }

    } else {
        echo "<p class='not-logged-in'>Usuário não está logado.</p>";
    }

    if (!isset($_SESSION['idUsuario']) || time() > $_SESSION['expire']) {
        // A sessão expirou ou o usuário não está logado, redireciona para a página de login
        header("Location: logout.php");
        exit();
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="nui/piseiro.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            background-color: #001529ee;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .container {
            max-width: 900px;
            margin: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container_history {
            max-width: 900px;
            margin: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        h1, h2 {
            text-align: center;
            color: #3498db;
        }

        .data {
            padding: 20px;
        }
        
        .container_history {
            padding: 20px;
        }

        .data p, .history p {
            margin: 15px 0;
        }

        .data span, .email-visible {
            font-weight: bold;
            color: #3498db;
        }

        .history {
            background-color: #f6f6f6;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td:last-child {
            text-align: center;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #2073b1;
        }

        td:contains {
            position: relative;
        }

        td:contains("SUCESSO"):before {
            content: "✔ ";
            color: #27ae60;
        }

        td:contains("PENDENTE"):before {
            content: "⏳ ";
            color: #e67e22;
        }

        td:contains("FALHA"):before {
            content: "✖ ";
            color: #e74c3c;
        }

        .conectar-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reveal-email {
            cursor: pointer;
            margin-top: 5px;
            color: #3498db;
            text-decoration: underline;
        }

        .email-hidden {
            display: none;
        }

        .back-btn {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
        }

        .logout-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .logout-btn button {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="data">
            <img class="logo-img" src="<?php echo $_SESSION['imagem']; ?>" alt="Foto do usuário">
            <p><span><?php echo $row['name']; ?></span></p>
            <p><strong>Id da conta: </strong><span><?php echo $row['id']; ?></span></p>
            <p><strong>Account ID: </strong><span>#<?php echo $row['id']; ?></span></p>
            <p><strong>ALLOWLIST</strong> NAO DESPONIVEL</p>
            <a href="url_da_pagina_conectar" class="conectar-button" target="_blank"><strong>CONECTAR</strong></a>
            <a href="https://piseirorj.hydrus.gg/categories/315768" class="conectar-button" target="_blank"><strong>COMPRAR</strong></a>
            <p><strong>SteamHex: </strong> <span>NULL</span></p>
            <!--<p><strong>Vinculado ao Discord: </strong><span><?php echo ($row[''] ? 'SIM' : 'NÃO'); ?></span></p>-->
            <button onclick="imagpage()">Trocar Imagem</button>
        </div>
    </div>
    
    <div class="container_history">
        <h2>Seus Dados</h2>
        <p><strong>Nome do Discord:</strong><span> NULL<?php echo $row['usuariodc']; ?></span></p>
        <p><strong>Email: </strong><span class="email-visible"> <?php echo $row['email']; ?></span><span class="email-hidden"></span><span class="reveal-email" onclick="revealEmail()"> Ocultar Email</span></p>
        <p><strong>Chave de recuperação: </strong><span><?php echo $row['chaverandom']; ?></span></p>
        <table>
        <tr>
            <td><strong>Observações de Bans:</strong></td>
            <td><?php echo $row['obs']; ?></td>
        </tr>
        </table>

        <div class="back-btn">
            <button onclick="goToHomePage()">Voltar para o Home</button>
        </div>

        <script>
            function goToHomePage() {
                window.location.href = "home.php";
            }
        </script>

        <div class="logout-btn">
            <button onclick="logout()">Fazer Logout</button>
        </div>

        <script>
            function logout() {
                window.location.href = "logout.php";
            }
        </script>

    </div>

    <script>
        function imagpage() {
            // Substitua 'caminho_da_pagina.html' pelo caminho real da página HTML para a qual deseja redirecionar
            window.location.href = 'selecionar_imagem.php';
        }
    </script>


    <script>
        function revealEmail() {
            var emailVisible = document.querySelectorAll('.email-visible');
            var emailHidden = document.querySelectorAll('.email-hidden');
            
            emailVisible.forEach(function(element) {
                element.style.display = (element.style.display === 'none') ? 'inline' : 'none';
            });

            emailHidden.forEach(function(element) {
                element.style.display = (element.style.display === 'none') ? 'inline' : 'none';
            });

            var revealButton = document.querySelector('.reveal-email');
            if (emailVisible[0].style.display === 'none') {
                revealButton.innerHTML = 'Mostrar Email';
            }
        }
    </script>

</body>
</html>