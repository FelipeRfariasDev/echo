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
    <?php include("header.php");?>
    <!--================== CONTAINER ==================-->
    <div class="container-principal">
        <div class="card-principal">
            <div class="card-image">
                <img src="public/assets/img/imgveiculo.png">
            </div>
            <h3 class="name">Veiculos</h3>
            <p class="comment">
                Liste e organize os veículos de sua empresa  
                com eficácia e de maneira simples.
            </p>
            <a href="?router=Site/veiculos/" class="btngerenciamento" style="margin-top: 59px;">Gerenciar</a>
        </div>
        <div class="card-principal">
            <div class="card-image">
                <img src="public/assets/img/imgfuncionarios.png">
            </div>
            <h3 class="name">Funcionarios</h3>
            <p class="comment">
                Liste e organize os funcionários que utilizam 
                suas frotas de carro, para que sua empresa seja 
                mais organizada.
            </p>
            <a href="?router=Site/funcionarios/" class="btngerenciamento">Gerenciar</a>
        </div>
        <div class="card-principal">
            <div class="card-image">
                <img src="public/assets/img/imgchamados.png">
            </div>
            <h3 class="name">Chamados</h3>
            <p class="comment">
                Gerencie em chamados qual funcionário utilizou qual 
                veículo, para que assim sua empresa tenha total controle 
                administrativo.
            </p>
            <a href="?router=Site/chamados/" class="btngerenciamento">Gerenciar</a>
        </div>
    </div>
    <?php include("footer.php");?>