<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Cadastro de Veiculos <a href='/Veiculos/index'> < </a></h1>

<form action="/Veiculos/novo" method="POST">

    <label for="placa">Placa</label>
    <input name="placa" type="text" required placeholder="Qual é a placa do Veículo?">

    <label for="marca">Marca</label>
    <input name="marca" type="text" required placeholder="Qual é a marca do Veículo?">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text" required placeholder="Qual é a autonomia do Veículo?">

    <button type="submit" class="">Salvar</button>

</form>


<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>