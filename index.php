<!DOCTYPE html>
<html>
    <head>
        <title>Piseiro RJ</title>
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
        }


        nav ul li a.active {
            /* Estilos para o botão ativo */
            background-image: url('nui/raio_azul.png');
            background-repeat: no-repeat;
            background-position: center bottom; /* Posiciona a imagem no centro inferior do botão */
            padding-bottom: 5px; /* Ajusta o espaço entre a imagem e o texto */
            padding-left: 10px; /* Ajuste o valor conforme necessário para posicionar a imagem */
            background-size: 40px; /* Ajusta o tamanho da imagem */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #00000034;
            color: #fff;
            padding: 10px;
            transition: padding 0.3s ease;
            position: fixed;
            top: 0;
            width: 98%;
            z-index: 1000;
        }


        header.scrolled {
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centraliza a barra */
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
        }

        /* Estilos para o logo */
        #logo {
            animation: logoAnimation 1s infinite alternate;
        }

        @keyframes logoAnimation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Estilos para a seção do banner */
        #banner {
            background-image: url('nui/gta_imag.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 450px;
        }


        #banner h1 {
            font-size: 36px;
            margin-bottom: 20px;
            font-family: "EuropaGroteskSH-MedIta", sans-serif;
        }



        .btn {
            background-color: #FFA500;
            border-radius: 20px;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border: none;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #FFC04D;
        }

        /* Estilos para a seção "Sobre Nós" */
        #como-jogar {
            background-color: #001529ee;
            padding: 50px;
            text-align: center;
            color: #fff;
        }

        #como-jogar h2 {
            font-size: 24px;
            margin-bottom: 20px;
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
            background-color: #001529ee;
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
            background-color: #001529ee;
            color: #fff;
            padding: 50px;
            text-align: center;
        }

        #vip h2 {
            font-size: 24px;
            margin-bottom: 20px;
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

        body {
            background-color: #001529ee;
            font-family: Arial, sans-serif;
            color: #fff;
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
            opacity: 1; /* Alterado para 1 para que o logotipo seja exibido automaticamente */
            transition: transform 0.5s ease;
            animation: logoSpin 5s infinite linear; /* Adicionada animação para o logotipo girar continuamente */
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
            /*background-color: rgba(0, 0, 0, 0.5);*/
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

        .banertitolo {
            color: #fff;
            text-align: center;
            padding: 50px; /* Ajuste conforme necessário */
            font-size: 36px;
            line-height: 1.5;
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
                    <li><a href="#contact">Contato</a></li>
                    <li><a href="#vip">Vip</a></li>
                </ul>
            </nav>
            <nav>
                <li><a href="login.html" class="btn">Login</a></li>
            </nav>    
        </header>

        <section id="banner">
            <!--<h1 class="banertitolo">Bem Vindo a Piseiro RJ!</h1>
            <p>Aqui na Piseiro nos persamos pelo seu RP.</p>
            <a href="#" class="btn">Saiba Mais</a>-->
        </section>

        <section id="como-jogar">
            <h2>Como jogar na cidade Piseiro RJ ?</h2>
            <p>Para acessar nossos servidores, é necessário atender a alguns pré-requisitos:</p>
        </section>

        <section id="vip">
            <h2>💎VIP💎</h2>
            <p>CONHEÇA OS PLANOS</p>
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
            <h2>⚙️ NOTICIAS 🛠️</h2>
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
                // Remove a classe 'active' de todos os links
                navLinks.forEach(link => link.classList.remove('active'));

                // Adiciona a classe 'active' ao link clicado
                link.classList.add('active');

                header.classList.add('scrolled');
                });
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                btn.style.backgroundImage = "url('nui/raio_azul_scrolled.png')";
                } else {
                btn.style.backgroundImage = "url('nui/raio_azul.png')";
                }
            });

        </script>

        <footer>
            <p>&copy; 2023 PiseiroRJ. Todos os direitos reservados.</p>
        </footer>
    </body>
</html>
