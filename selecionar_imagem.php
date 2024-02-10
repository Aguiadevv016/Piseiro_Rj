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

    // Inicializar a mensagem de notificação
    $notification = "";

    // Verificar se o usuário está logado
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Obter a nova URL da imagem do formulário POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $novaUrl = $_POST['urlImagem'];

            // Atualizar a URL da imagem no banco de dados
            $query = "UPDATE users SET imagem = '$novaUrl' WHERE email = '$email'";
            $result = $conn->query($query);

            if ($result) {
                // Atualização bem-sucedida
                $_SESSION['imagem'] = $novaUrl;
                $notification = "Imagem atualizada com sucesso!";
            } else {
                // Erro na atualização
                $notification = "Erro ao atualizar a imagem no banco de dados: " . $conn->error;
            }
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Imagem</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 400px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .notification {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Mudar Imagem do Usuário</h1>
        <form method="post">
            <label for="urlImagem">Nova URL da Imagem:</label>
            <input type="text" id="urlImagem" name="urlImagem" required>
            <button type="submit">Atualizar Imagem</button>
            <button onclick="goToHomePage()">Voltar para o Home</button>
        </form>

        <!-- Mostrar a notificação -->
        <?php if (!empty($notification)): ?>
            <div class="notification"><?php echo $notification; ?></div>
        <?php endif; ?>
    </div>

    <script>
        function goToHomePage() {
            window.location.href = "home.php";
        }
    </script>
</body>
</html>
