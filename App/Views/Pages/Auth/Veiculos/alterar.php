<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Alterar Veiculo <a href='?router=Veiculos/index'> < </a></h1>

<form action="?router=Veiculos/alterar" method="POST">
    <input type="hidden" value="<?php echo $_SESSION["getByIdVeiculo"]["id"];?>" name="id">
    <label for="placa">Placa</label>
    <input name="placa" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["placa"];?>">

    <label for="marca">Marca</label>
    <input name="marca" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["marca"];?>">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["autonomia"];?>">

    <button type="submit" class="">Atualizar</button>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>