<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados (substitua com suas informações de conexão)
    $servername = "sql105.infinityfree.com";
    $username = "if0_35794528";
    $password_db = "ZxLv63t600VNqgR";
    $dbname = "if0_35794528_wolfshild";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os valores do formulário (aplicar validação aqui se necessário)
    $name = $_POST["name"];
    $email = $_POST["email"];
    $user_password = $_POST["password"];

    // Define a permissão padrão como "Usuário"
    $permission = "Usuario";

    // Gera as chaves aleatórias
    $chaveRandom = substr(md5(uniqid(mt_rand(), true)), 0, 16);
    $chaveAdm = substr(md5(uniqid(mt_rand(), true)), 0, 32);
    $chaveConta = generateRandomString(8);

    // Insere os valores no banco de dados usando instruções preparadas
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, chaverandom, chaveadm, chaveconta, permission) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $user_password, $chaveRandom, $chaveAdm, $chaveConta, $permission);

    if ($stmt->execute()) {
        // Registro bem-sucedido, redireciona para a página de login
        header("Location: login.html");
        exit();
    } else {
        // Erro ao inserir no banco de dados
        echo "Erro ao registrar: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

// Função para gerar uma string aleatória de comprimento específico
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
