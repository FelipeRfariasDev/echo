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
                    <li><a href="https://github.com/LuanODias/Echo-mvc" class="nav-link" style="border-bottom-left-radius: 40px; border-top-left-radius: 40px;">GITHUB</a></li>
                    <li><a href="?router=Site/integrantes/" class="nav-link">Integrantes</a></li>
                    <li><a href="?router=Site/carbono/" class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Carbono</a></li>
                </ul>
            </div>
            <a href="?router=Site/login/" class="btnAcessar">Acesse já</a>
        </nav>
    </header>
    


    <!--================== CONTAINER ==================-->


    <section class="container">
        <div class="container-item-1">
            <h1>Conheça a Echo</h1>
            <p>
                A empresa que lhe ajudará a organizar sua empresa de uma maneira ecológicamente correta. 
                Obtenha o máximo desempenho de seu negócio com nossa plataforma.
            </p>
        </div>
        <div class="container-item-2 z-index">
            <img src="public/assets/img/ExemploMenu.png" class="exemplo"/>
        </div> 
    </section>
    <img src="public/assets/svg/Wave.svg" alt="Wave" class="wave">
    
    <div class="background">
        <section class="container-2">
            <div class="container-item-2">
                <h1>Gerencie suas frotas</h1>
                <p>Nossa plataforma gerencia suas frotas de maneira simples e segura com foco na diminuição do carbono gerado</p>
            </div>
            <div class="container-item-3">
                <div class="card">
                    <div class="card-image">
                        <img src="public/assets/img/imgveiculo.png">
                    </div>
                    <h3 class="name">Veiculos</h3>
                    <p class="comment">
                        Liste e organize os veículos de sua empresa  
                        com eficácia e de maneira simples.
                    </p>
                </div>
                <div class="card">
                    <div class="card-image">
                        <img src="public/assets/img/imgfuncionarios.png">
                    </div>
                    <h3 class="name">Funcionarios</h3>
                    <p class="comment">
                        Liste e organize os funcionários que utilizam 
                        suas frotas de carro, para que sua empresa seja 
                        mais organizada.
                    </p>
                </div>
                <div class="card">
                    <div class="card-image">
                        <img src="public/assets/img/imgchamados.png">
                    </div>
                    <h3 class="name">Chamados</h3>
                    <p class="comment">
                        Gerencie em chamados qual funcionário utilizou qual 
                        veículo, para que assim sua empresa tenha total controle 
                        administrativo.
                    </p>
                </div>
            </div>
        </section>

        


        
            <div class="container-item-4">
                <h1>Relatórios</h1>
                <p>Organize sua empresa com relatórios práticos e intuitivos</p>
            </div>
            <section class="container-4">
            <div class="container-item-5">
                <lottie-player class="lottie" src="https://assets6.lottiefiles.com/packages/lf20_6bnsw9la.json"  background="transparent"  speed="1"  style="width: 500px; margin-left: 30vh;"  loop  autoplay></lottie-player>
                <lottie-player class="lottie1" src="https://assets6.lottiefiles.com/packages/lf20_6bnsw9la.json"  background="transparent"  speed="1"  style="width: 300px;"  loop  autoplay></lottie-player>
            </div>
                 <div class="container-item-6">
                        <p class="paragraph">Crie relatórios customisaveis para gerenciar sua empresa com máxima eficiência empresarial 
                            e ecologica, assim melhoramos sua empresa e o meio ambiente, entre agora no nosso projeto.
                        </p>
                </div>
            </section>

            <div class="spacing"></div>
        <!--================== SCRIPTS ==================-->

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>