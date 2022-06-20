<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Cadastro de Veiculos <a href='?router=Veiculos/index'> < </a></h1>

<form action="?router=Veiculos/novo" method="POST">

    <label for="placa">Placa</label>
    <input name="placa" type="text" required>

    <label for="marca">Marca</label>
    <input name="marca" type="text">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text">

    <button type="submit" class="">Novo</button>

</form>


<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>