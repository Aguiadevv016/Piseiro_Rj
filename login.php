<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados (substitua com suas informações de conexão)
    $servername = "sql105.infinityfree.com";
    $username = "if0_35794528";
    $password = "ZxLv63t600VNqgR";
    $dbname = "if0_35794528_wolfshild";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os valores do formulário
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verifica se o email e a senha estão corretos no banco de dados
    $sql = "SELECT id, chaverandom, chaveadm FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login bem-sucedido, atualiza as chaves aleatórias
        session_start();
        $row = $result->fetch_assoc();
        $idUsuario = $row['id'];
        $chaveRandom = substr(md5(uniqid(mt_rand(), true)), 0, 16);
        $chaveAdm = substr(md5(uniqid(mt_rand(), true)), 0, 32);

        // Atualiza as chaves aleatórias no banco de dados
        $updateSql = "UPDATE users SET chaverandom = '$chaveRandom', chaveadm = '$chaveAdm' WHERE id = '$idUsuario'";
        $conn->query($updateSql);

        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['chaveRandom'] = $chaveRandom;
        $_SESSION['chaveAdm'] = $chaveAdm;
        $_SESSION['expire'] = time() + (24 * 60 * 60); // Define o tempo de expiração em 24 horas
        $_SESSION['email'] = $email;
        
        header("Location: home.php");
        exit();
    } else {
        // Login inválido, exibe uma mensagem de erro
        echo "Email ou senha inválidos";
    }

    $conn->close();
}
?>
