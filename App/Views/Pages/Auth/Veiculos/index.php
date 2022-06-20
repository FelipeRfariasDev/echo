<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1>Buscar Veiculos <a href="/Veiculos/novo">(+)</a></h1>

<?php
if (@$_SESSION["msgVeiculoAdicionadoSucesso"]==true) {
    ?>
    <div class="notification is-success" style="color: #ffffff;text-decoration-line: underline;background-color: #6d985d;">
        <p>Veículo adicionado com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoAdicionadoSucesso"]=false;
}
?>

<?php
if (@$_SESSION["msgVeiculoAlteradoSucesso"]==true) {
    ?>
    <div class="notification is-success" style="color: #ffffff;text-decoration-line: underline;background-color: #6d985d;">
        <p>Veículo alterado com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoAlteradoSucesso"]=false;
}
?>

<?php
if (@$_SESSION["msgVeiculoRemovidoSucesso"]==true) {
    ?>
    <div class="notification is-success" style="color: #ffffff;text-decoration-line: underline;background-color: #6d985d;">
        <p>Veículo excluído com sucesso!</p>
    </div>
    <?php
    $_SESSION["msgVeiculoRemovidoSucesso"]=false;
}
?>

<form action="/Veiculos/index" method="POST">
    <input type="hidden" name="acao" value="buscar">
    <label for="placa">Placa</label>
    <input name="placa" type="text" placeholder="Qual é a placa do Veículo?">

    <label for="marca">Marca</label>
    <input name="marca" type="text" placeholder="Qual é a marca do Veículo?">

    <label for="autonomia">Autonomia</label>
    <input name="autonomia" type="text" placeholder="Qual é a autonomia do Veículo?">

    <button type="submit" class="">Buscar</button>
</form>
<br>
<?php if(!empty($_SESSION["getVeiculos"])){?>
<table style="float: left">
    <tr>
        <td>Placa</td>
        <td>Marca</td>
        <td>Autonomia</td>
    </tr>
    <?php
    foreach($_SESSION["getVeiculos"] as $getVeiculo):?>
    <tr>
        <td><?php echo $getVeiculo["placa"];?></td>
        <td><?php echo $getVeiculo["marca"];?></td>
        <td><?php echo $getVeiculo["autonomia"];?></td>
        <td>
            <a href='/Veiculos/alterar/&id=<?php echo $getVeiculo["id"];?>'>alterar</a>
            <a href='/Veiculos/excluir/&id=<?php echo $getVeiculo["id"];?>' onclick="javascript:return confirm('Tem certeza que deseja excluir?')">excluir</a>
        </td>
    </tr>
    <?php endforeach;

    ?>
</table>
<?php }else{ ?>
    Resultado da busca: Nenhum veiculo cadastrado
<?php }?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>