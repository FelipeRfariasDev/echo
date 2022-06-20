<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Alterar Veiculo <a href='/Veiculos/index'> < </a></h1>

<form action="Veiculos/alterar" method="POST">
    <input type="hidden" value="<?php echo $_SESSION["getByIdVeiculo"]["id"];?>" name="id">
    <label for="placa">Placa</label>
    <input name="placa" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["placa"];?>" required placeholder="Qual é a placa do Veículo?">

    <label for="marca">Marca</label>
    <input name="marca" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["marca"];?>" required placeholder="Qual é a marca do Veículo?">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["autonomia"];?>" required placeholder="Qual é a autonomia do Veículo?">

    <button type="submit" class="">Atualizar</button>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>