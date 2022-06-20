<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Buscar Veiculos <a href="?router=Veiculos/novo">(+)</a></h1>

<?php
if (@$_SESSION["msgVeiculoAdicionadoSucesso"]==true) {
    ?>
    <div class="notification is-success">
        <p>Veículo adicionado com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoAdicionadoSucesso"]=false;
}
?>

<?php
if (@$_SESSION["msgVeiculoAlteradoSucesso"]==true) {
    ?>
    <div class="notification is-success">
        <p>Veículo alterado com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoAlteradoSucesso"]=false;
}
?>

<?php
if (@$_SESSION["msgVeiculoRemovidoSucesso"]==true) {
    ?>
    <div class="notification is-success">
        <p>Veículo excluído com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoRemovidoSucesso"]=false;
}
?>

<form action="?router=Veiculos/index" method="POST">
    <input type="hidden" name="acao" value="buscar">
    <label for="placa">Placa</label>
    <input name="placa" type="text">

    <label for="marca">Marca</label>
    <input name="marca" type="text">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text">

    <button type="submit" class="">Buscar</button>
</form>
<br>
<?php if(!empty($_SESSION["getVeiculos"])){?>
<table style="float: left">
    <tr>
        <td>Id</td>
        <td>Placa</td>
        <td>Marca</td>
        <td>Autonomia</td>
    </tr>
    <?php
    foreach($_SESSION["getVeiculos"] as $getVeiculo):?>
    <tr>
        <td><?php echo $getVeiculo["id"];?></td>
        <td><?php echo $getVeiculo["placa"];?></td>
        <td><?php echo $getVeiculo["marca"];?></td>
        <td><?php echo $getVeiculo["autonomia"];?></td>
        <td>
            <a href='?router=Veiculos/alterar/&id=<?php echo $getVeiculo["id"];?>'>alterar</a>
            <a href='?router=Veiculos/excluir/&id=<?php echo $getVeiculo["id"];?>' onclick="javascript:return confirm('Tem certeza que deseja excluir?')">excluir</a>
        </td>
    </tr>
    <?php endforeach;

    ?>
</table>
<?php } ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>