<?php

session_start();

// Fazer a conexão com o banco de dados
$servername = "sql105.infinityfree.com";
$username = "if0_35794528";
$password = "ZxLv63t600VNqgR";
$dbname = "if0_35794528_wolfshild";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se a variável de sessão está definida
if (isset($_SESSION['idUsuario'])) {
    // Obter o ID do usuário da variável de sessão
    $idUsuario = $_SESSION['idUsuario'];

    // Consulta SQL para buscar as informações do usuário
    $sql = "SELECT imagem FROM users WHERE id = $idUsuario";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['imagem'] = $row['imagem'];
        } else {
            echo "Nenhum usuário encontrado.";
        }
    } else {
        echo "Erro na consulta: " . $conn->error;
    }
} else {
    echo "Variável de sessão 'idUsuario' não está definida.";
}

if (!isset($_SESSION['idUsuario']) || time() > $_SESSION['expire']) {
  // A sessão expirou ou o usuário não está logado, redireciona para a página de login
  header("Location: logout.php");
  exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Piseiro Rj</title>
        <link rel="icon" href="nui/piseiro.ico">
        <meta charset="UTF-8">
    </head>
    <style>
        /* Reset de estilos */
        @font-face {
            font-family: 'EuropaGroteskSH-MedIta';
            src: url('EuropaGroteskSH-MedIta.oft') format('truetype');
        }


        body, html {
            margin: 0;
            padding: 0;
            background-color: #001529ee;
        }

        /* Estilos gerais */
        body {
            font-family: "Europa Grotesk", sans-serif;
            color: #fff;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        /* Estilos para o header */
        header {
            display: flex;
            align-items: center;
            background-color: #00000034;
            color: #fff;
            padding: 10px;
            transition: padding 0.3s ease;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        header.scrolled {
            padding: 10px;
        }

        .logo-img {
            width: 65px;
            height: 65px;
            border-radius: 50%;
        }

        .logo-text {
            font-size: 24px;
            margin-left: 10px;
            font-weight: bold;
        }

        nav {
            text-align: center;
        }

        .barra {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .barra li {
            display: inline-block;
            margin-right: 20px;
        }

        .barra li:last-child {
            margin-right: 0;
        }

        .barra a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .barra a:hover {
            color: #fff;
        }

        nav ul li a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a.active {
            background-image: url('nui/raio_azul.png');
            background-repeat: no-repeat;
            background-position: center bottom;
            padding-bottom: 5px;
            padding-left: 10px;
            background-size: 40px;
        }

        /* Estilos para a seção do banner */
        #banner {
            background-image: url('nui/gta_imag.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 300px;
        }

        #banner h1 {
            font-size: 36px;
            margin-bottom: 20px;
            font-family: "EuropaGroteskSH-MedIta", sans-serif;
        }

        /* Estilos para a seção "como-jogar" */
        #como-jogar {
            background-color: #001529ee;
            padding: 50px;
            text-align: center;
            color: #fff;
            font-family: "Europa Grotesk", sans-serif;
        }

        #como-jogar h2 {
            font-size: 32px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        #como-jogar p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #como-jogar ol {
            text-align: left;
            margin-left: 40px;
            font-size: 18px;
        }

        #como-jogar ol li {
            margin-bottom: 10px;
        }

        #como-jogar a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        #como-jogar a:hover {
            text-decoration: underline;
        }

        #como-jogar video {
            width: 100%;
            max-width: 640px;
            height: auto;
            margin: 20px auto;
            float: left;
        }

        #como-jogar ol li {
            background-color: #000e3a;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-right: 10px;
        }

        /* Estilos para a seção "Noticias" */
        #noticias {
            background-color: #001529ee;
            color: #fff;
            padding: 50px;
            text-align: center;
        }

        #noticias h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        #noticias ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        #noticias ul li {
            margin-bottom: 10px;
        }

        /* Estilos para o formulário de contato */
        #contact {
            background-color: #000e3a;
            padding: 50px;
            text-align: center;
            color: #fff;
        }

        #contact h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #contact form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #contact label {
            margin-bottom: 10px;
        }

        #contact input {
            padding: 5px;
            margin-bottom: 10px;
        }

        /* Estilos para a seção "Vip" */

        #vip {
            background-color: #001529ee; /* Cor de fundo padrão */
            background-image: url("https://cdn.discordapp.com/attachments/1180289717162496091/1195530733024981042/background.png?ex=65b453c2&is=65a1dec2&hm=ca2ed2389591634ab1c125260e385b4aa1b389c78c6e664c4e47eca9fab9dd2a&"); /* Imagem de fundo */
            font-family: "Europa Grotesk", sans-serif;
            color: #fff;
            padding: 70px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            position: relative;
        }

        .pack-container {
            flex-basis: 30%;
            max-width: 845.02px; /* Define a largura máxima para os retângulos */
            position: relative;
            font-family: "Europa Grotesk", sans-serif;
        }

        .pack {
            background-color: #fff;
            color: #555;
            font-family: "Europa Grotesk", sans-serif;
            padding: 50px;
            text-align: center;
            position: relative;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .pack:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            font-family: "Europa Grotesk", sans-serif;
        }

        .pack.gold {
            background-color: #f0e68c;
            font-family: "Europa Grotesk", sans-serif;
            color: #333;
        }

        .pack.diamond {
            background-color: #87ceeb;
            font-family: "Europa Grotesk", sans-serif;
            color: #fff;
        }

        .pack h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-family: "Europa Grotesk", sans-serif;
        }

        .pack p {
            margin: 10px 0;
            font-family: "Europa Grotesk", sans-serif;
        }

        .pack .btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            transition: background-color 0.3s ease-in-out;
            border-radius: 5px;
            font-family: "Europa Grotesk", sans-serif;
        }

        .pack .btn:hover {
            background-color: #555;
            font-family: "Europa Grotesk", sans-serif;
        }

        .title {
            position: absolute;
            top: -30px;
            left: 0;
            right: 0;
            margin: 0 auto;
            font-size: 24px;
            font-weight: bold;
            font-family: "Europa Grotesk", sans-serif;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .pack {
            animation: fadeIn 1s ease-in-out;
        }

        /* Estilos para o rodapé */
        footer {
            background-color: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 90px auto;
            padding: 80px;
            background-color: #001529bb;
            border-radius: 55px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .logo2 {
            position: relative;
            text-align: center;
        }

        .logo2 img {
            width: 100px;
            position: absolute;
            top: -95px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 1;
            transition: transform 0.5s ease;
            animation: logoSpin 5s infinite linear;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .slideshow-container img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slideshow-container img.active {
            display: block;
        }

        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            font-size: 24px;
            display: none;
        }

        .text-overlay.active {
            display: block;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .buttonupdate {
            background-color: #FFA500;
            border-radius: 20px;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border: none;
            transition: background-color 0.3s ease;
            font-size: 9px;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
        }

        #iframe-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            z-index: 9999;
        }

        #iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
        }

        .disabled {
            opacity: 0.5;
            pointer-events: none;
        }

        .overlayb {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
        }
        
        .overlayb iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-right {
            display: flex;
            align-items: center;
            margin-left: auto;
            position: absolute;
            top: 5px;
            right: 25px;
        }

        .nav-right p {
            color: #fff;
        }
        
        /* Estilos personalizados */
        .logo-text {
            color: #FFA500;
        }

        button {
            background-color: #3498db; /* Cor de fundo */
            color: #ffffff; /* Cor do texto */
            padding: 10px 20px; /* Espaçamento interno */
            font-size: 16px; /* Tamanho da fonte */
            border: none; /* Sem borda */
            border-radius: 5px; /* Borda arredondada */
            cursor: pointer; /* Cursor ao passar por cima */
        }


    </style>
    <body>
        <header class="header">
            <div>
                <a id="logo">
                    <img src="nui/piseirosemfundo.png" alt="Logo" width="100" height="65">
                </a>
            </div>
            <nav>
                <ul class="barra">
                    <li><a href="#banner">Início</a></li>
                    <li><a href="#noticias">Notícias</a></li>
                    <li><a href="#como-jogar">Como Jogar</a></li>
                    <li><a href="#vip">Vip</a></li>
                    <!--<li><a href="#contact">Contato</a></li>-->
                    <!-- <a href="wolfcoins.php?idUsuario=<?php echo $idUsuario; ?>">Wolf Coins</a>-->
                </ul>
            </nav>
        </header>
        <header>
            <nav>
                <a class="nav-right" href="detalhesconta.php">
                    <img class="logo-img" src="<?php echo $_SESSION['imagem']; ?>" alt="Foto do usuário">
                </a>
            </nav>
        </header>


        <section id="banner">
           <!-- <h1>Bem-vindo à Cidade Wolf!</h1>
            <p>Somos uma empresa especializada em serviços de alta qualidade.</p>
            <a href="#" class="btn">Saiba Mais</a>-->
        </section>

        <section id="como-jogar">
            <h2>Como Jogar na Piseiro Rj ?</h2>
            <p>Para acessar nossos servidores, é necessário atender a alguns pré-requisitos:</p>
            <ol>
                <li>
                    <div>
                        <p>1 - Possuir a Allowlist na Wolf (clique <a href="#">aqui</a> para saber como obter a Allowlist)</p>
                    </div>
                </li>
                <li>
                    <div>
                        <p>2 - Ter uma cópia digital original do jogo GTA V (pela Steam, Epic ou Rockstar Launcher).</p>
                    </div>
                </li>
                <li>
                    <div>
                        <p>3 - Ter o FiveM instalado (clique <a href="#">aqui</a> para acessar o website).</p>
                    </div>
                </li>
                <li>
                    <div>
                        <p>4 - Vídeo:</p>
                    </div>
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>
                </li>
            </ol>
        </section>

        <section id="vip">
            <div class="title">CONHEÇA OS PLANOS VIP</div>
            <div>
                <a href="https://piseirorj.hydrus.gg/categories/315768" class="button">Obtenha o seu VIP</a>
            </div>


            <!--<div class="pack-container">
                <div class="pack">
                    <h2>Silver PACK</h2>
                    <p>Acesso a tatuagens exclusivas</p>
                    <p>Acesso a cabelos exclusivos</p>
                    <p>Acesso a roupas exclusivas</p>
                    <p>Acesso ao Altaliza</p>
                    <p>Slots no Market: 5</p>
                    <p>Tempo de expiração no Market: 3 dias</p>
                    <p>Perda de Mochila ao Desmaiar: 20%</p>
                    <p>Máximo de aumento de Peso na mochila: 60kg</p>
                    <p>Peso Extra: 9kg</p>
                    <p>Prioridade na Fila: 30</p>
                    <h2>R$50,00</h2>
                    <p>(30 dias)</p>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>

            <div class="pack-container">
                <div class="pack gold">
                    <h2>Gold PACK</h2>
                    <p>Acesso a tatuagens exclusivas</p>
                    <p>Acesso a cabelos exclusivos</p>
                    <p>Acesso a roupas exclusivas</p>
                    <p>Acesso ao Altaliza</p>
                    <p>Slots no Market: 5</p>
                    <p>Tempo de expiração no Market: 3 dias</p>
                    <p>Perda de Mochila ao Desmaiar: 20%</p>
                    <p>Máximo de aumento de Peso na mochila: 60kg</p>
                    <p>Peso Extra: 9kg</p>
                    <p>Prioridade na Fila: 30</p>
                    <h2>R$50,00</h2>
                    <p>(30 dias)</p>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>

            <div class="pack-container">
                <div class="pack diamond">
                    <h2>Diamond PACK</h2>
                    <p>Acesso a tatuagens exclusivas</p>
                    <p>Acesso a cabelos exclusivos</p>
                    <p>Acesso a roupas exclusivas</p>
                    <p>Acesso ao Altaliza</p>
                    <p>Slots no Market: 5</p>
                    <p>Tempo de expiração no Market: 3 dias</p>
                    <p>Perda de Mochila ao Desmaiar: 20%</p>
                    <p>Máximo de aumento de Peso na mochila: 60kg</p>
                    <p>Peso Extra: 9kg</p>
                    <p>Prioridade na Fila: 30</p>
                    <h2>R$50,00</h2>
                    <p>(30 dias)</p>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>-->
        </section>
        

        <script>
            
            var scrollEnabled = true;
            // Verifica se está na segunda aba e desabilita o scroll
            function checkTabIndex() {
                var iframe = document.getElementById("iframe");
                var currentTabIndex = iframe.getAttribute("data-tab-index");
                scrollEnabled = currentTabIndex === "1";
            }

            // Função para desabilitar o scroll do mouse
            function disableScroll() {
                if (!scrollEnabled) {
                    return;
                }

                if (window.addEventListener) {
                    window.addEventListener("DOMMouseScroll", preventDefault, false);
                }
                window.onwheel = preventDefault;
                window.onmousewheel = document.onmousewheel = preventDefault;
                window.ontouchmove = preventDefault;
                document.onkeydown = preventDefaultForScrollKeys;
            }

            // Função para habilitar o scroll do mouse
            function enableScroll() {
                if (window.removeEventListener) {
                    window.removeEventListener("DOMMouseScroll", preventDefault, false);
                }
                window.onwheel = null;
                window.onmousewheel = document.onmousewheel = null;
                window.ontouchmove = null;
                document.onkeydown = null;
            }

            // Função auxiliar para prevenir o comportamento padrão do scroll
            function preventDefault(e) {
                e = e || window.event;
                if (e.preventDefault) {
                    e.preventDefault();
                }
                e.returnValue = false;
            }

            // Função auxiliar para prevenir o comportamento padrão de determinadas teclas
            function preventDefaultForScrollKeys(e) {
                // 38: seta para cima, 40: seta para baixo
                if (e.keyCode === 38 || e.keyCode === 40) {
                    preventDefault(e);
                    return false;
                }
            }

            function abrirPagina(url) {
                var iframeContainer = document.getElementById("iframe-container");
                var iframe = document.getElementById("iframe");
    
                iframe.src = url;
                iframeContainer.style.display = "block";
            }
    
            var iframe = document.getElementById("iframe");
            var mainButtons = document.getElementsByClassName("close-button");
    
            // Função para lidar com a mensagem recebida do iframe filho
            function handleMessage(event) {
                var arquivo = event.data;
    
                // Verifica o nome do arquivo e executa a lógica apropriada
                if (arquivo === "update.html") {
                    fecharPagina();
                    // Outra lógica para fechar o arquivo "update.html" se necessário
                } else if (arquivo === "pagina2.html") {
                    desabilitarBotoes();
                    // Lógica para fechar o arquivo "pagina2.html"
                } else if (arquivo === "pagina3.html") {
                    // Lógica para fechar o arquivo "pagina3.html"
                }
            }
    
            // Adiciona o ouvinte de eventos para ouvir as mensagens do iframe filho
            window.addEventListener("message", handleMessage);
    
            function enviarMensagemFecharPagina(arquivo) {
                // Envia uma mensagem para o iframe com o nome do arquivo
                iframe.contentWindow.postMessage(arquivo, "*");
            }
    
            function fecharPagina() {
                var iframeContainer = document.getElementById("iframe-container");
                iframeContainer.style.display = "none";
            }
    
            function desabilitarBotoes() {
                for (var i = 0; i < mainButtons.length; i++) {
                    mainButtons[i].classList.add("disabled");
                }
            }
        </script>
    
        <section id="noticias">
            <h2>#NOTICIAS</h2>
            <div class="slideshow-container">
                <img src="https://cdn.discordapp.com/attachments/1058552286911156334/1127377477749182495/Nota_de_Atuacao_wolf.png" class="active" alt="Image 1">
                <div class="text-overlay active" style="position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%);">
                    EX: [4.0.5 Notas de atualização] Funcionalidades e melhorias!
                    <button class="buttonupdate" onclick="abrirPagina('update.html')">Ver Mais</button>
                </div>
                <img src="https://cdn.discordapp.com/attachments/1058552286911156334/1127377477749182495/Nota_de_Atuacao_wolf.png" alt="Image 2">
                <div class="text-overlay" style="position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%);">
                    EM BREVE
                    <button class="buttonupdate" onclick="abrirPagina('pagina2.html')">Ver Mais</button>
                </div>
                <img src="https://cdn.discordapp.com/attachments/1058552286911156334/1127377477749182495/Nota_de_Atuacao_wolf.png" alt="Image 3">
                <div class="text-overlay" style="position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%);">
                    EM BREVE.
                    <button class="buttonupdate" onclick="abrirPagina('pagina3.html')">Ver Mais</button>
                </div>
    
                <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
                <a class="next" onclick="changeSlide(1)">&#10095;</a>
            </div>
        </section>
    
        <div id="iframe-container">
            <iframe id="iframe" src="index.html" width="100%" height="100%"></iframe>
        </div>
    
        <script>
            let slideIndex = 0;
            showSlide(slideIndex);
    
            function changeSlide(n) {
                showSlide(slideIndex += n);
            }
    
            function showSlide(n) {
                const slides = document.querySelectorAll('.slideshow-container img');
                const overlays = document.querySelectorAll('.slideshow-container .text-overlay');
    
                if (n >= slides.length) {
                    slideIndex = 0;
                }
                if (n < 0) {
                    slideIndex = slides.length - 1;
                }
    
                for (let i = 0; i < slides.length; i++) {
                    slides[i].classList.remove('active');
                    overlays[i].classList.remove('active');
                }
    
                slides[slideIndex].classList.add('active');
                overlays[slideIndex].classList.add('active');
            }
        </script>
        
        <!--<div class="container">
            <section id="contact">
                <div class="logo2">
                    <img src="nui/wolf_semfundo.png" alt="Logo">
                  </div>
                <h2>Entre em contato</h2>
                <form>
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name">
                    <label for="surname">Apelido</label>
                    <input type="text" id="surname" name="surname">
                    <label for="discord">Discord</label>
                    <input type="text" id="discord" name="discord">
                    <label for="reason">Motivo</label>
                    <input type="text" id="reason" name="reason">
                    <button type="submit" class="btn">Enviar</button>
                </form>
            </section>
        </div>-->

        <script>
            const navLinks = document.querySelectorAll('nav ul li a');
            const header = document.querySelector('.header');
            const btn = document.querySelector('.raio_azul');

            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.forEach(otherLink => {
                        otherLink.classList.remove('active');
                    });
                    link.classList.add('active');
                });
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            btn.addEventListener('click', () => {
                btn.classList.toggle('active');
                disableScroll();
            });

            header.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') {
                    btn.classList.remove('active');
                    enableScroll();
                }
            });

            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
        </script>

        <script>
         // Simulação de dados - substitua isso com dados reais da sua aplicação
         const streamers = [
             { id: "streamer1", status: "online", destacado: false },
             { id: "streamer2", status: "offline", destacado: false },
             { id: "streamer3", status: "online", destacado: true }
         ];
        
         // Função para atualizar o status dos streamers
         function atualizarStatus() {
             streamers.forEach(streamer => {
                 const elemento = document.getElementById(streamer.id);
                 const statusElemento = elemento.querySelector('.status');
                
                 if (streamer.status === 'online') {
                     statusElemento.classList.add('online');
                 } else {
                     statusElemento.classList.remove('online');
                 }
                
                 if (streamer.destacado) {
                     elemento.classList.add('destacado');
                 } else {
                     elemento.classList.remove('destacado');
                 }
             });
         }
        
         // Chamar a função ao carregar a página
         window.onload = atualizarStatus;
        </script>

        <footer>
            <p>&copy; 2023 PiseiroRJ. Todos os direitos reservados. | Desenvolvido por <a href="">Wolf King Company</a></p>
        </footer>
    </body>
</html>
