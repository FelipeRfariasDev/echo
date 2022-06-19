<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo - Gerenciamento de frotas ecológico</title>

<!--================== LINKS ==================-->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">


</head>
<body>
    <!--================== HEADER ==================-->
    <header>
        <nav class="navbar">
            <div class="nav-menu">
                <div class="logo">
                    <a href="?router=Site/home/"><img src="public/assets/svg/Logo.svg" alt="Echo"></a>
                </div>
                <div class="burger"><img src="public/assets/svg/burg.svg"></div>
                <ul class="nav-list">
                    <li><a href="https://github.com/LuanODias/Echo" class="nav-link" style="border-bottom-left-radius: 40px; border-top-left-radius: 40px;">Projeto</a></li>
                    <li><a href="?router=Site/integrantes/" class="nav-link">Integrantes</a></li>
                    <li><a href="?router=Site/carbono/" class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Carbono</a></li>
                </ul>
            </div>
            <a href="?router=Site/login/" class="btnAcessar">Acesse já</a>
        </nav>
    </header>

    <!--================== CONTAINER ==================-->


    <section class="container-carbono">
        <div class="container-item-carbono">
            <p>
                Pegada de carbono ou Carbon footprint é a nossa pegada ambiental no mundo, ou seja, é a quantidade de gás dióxido de carbono que produzimos. Todos os dias, pessoas e empresas, através das suas atividades e rotinas habituais – produzem dióxido de carbono, um gás poluente que é liberado na atmosfera.
            </p>    
        </div>
        <div class="container-item-2 z-index">
            <lottie-player class="lottie-carb-one" src="https://assets6.lottiefiles.com/private_files/lf30_rwpu0mow.json"  background="transparent"  speed="1"  style="width: 600px; height: 600px;"    autoplay></lottie-player>
            <lottie-player class="lottie-carb-two" src="https://assets6.lottiefiles.com/private_files/lf30_rwpu0mow.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"    autoplay></lottie-player>
        </div> 
    </section>
    <img src="public/assets/svg/Wave.svg" alt="Wave" class="wavecarbono">




    <!--================== scripts ==================-->

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>