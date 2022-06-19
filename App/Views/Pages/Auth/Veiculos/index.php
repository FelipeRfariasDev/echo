<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

            <h1>Veiculos <a href="?router=Site/veiculosNovo">(novo+)</a></h1>

                <?php
                if (!empty($_SESSION["msgVeiculoAdicionadoSucesso"]) && $_SESSION["msgVeiculoAdicionadoSucesso"]==true) {
                    ?>
                    <div class="notification is-success">
                        <p>Veículo adicionado com sucesso!</p>
                    </div>
                    <?php
                    $_SESSION["msgVeiculoAdicionadoSucesso"]=false;
                }
                ?>

                <?php
                if (!empty($_SESSION["msgVeiculoRemovidoSucesso"]) && $_SESSION["msgVeiculoRemovidoSucesso"]==true) {
                    ?>
                    <div class="notification is-success">
                        <p>Veículo excluído com sucesso!</p>
                    </div>
                    <?php
                    $_SESSION["msgVeiculoRemovidoSucesso"]=false;
                }
                ?>

            <form action="" method="POST">
                <input type="hidden" value="pesquisar" name="tiporequisicao">

                <label for="placa">placa</label>
                <input name="placa" type="text">

                <label for="marca">marca</label>
                <input name="marca" type="text">

                <label for="autonomia">autonomia</label>
                <input name="autonomia" type="text">

                <button type="submit" class="">Buscar</button>

            </form>
    <br>
    <table style="float: left">

        <tr>
            <td>#</td>
            <td>First</td>
            <td>Last</td>
            <td>Handle</td>
        </tr>

        <?php foreach($_SESSION["getVeiculos"] as $getVeiculo):?>
        <tr>
            <td><?php echo $getVeiculo["id"];?></td>
            <td><?php echo $getVeiculo["placa"];?></td>
            <td><?php echo $getVeiculo["marca"];?></td>
            <td><?php echo $getVeiculo["autonomia"];?></td>
            <td>
                <a href='?router=Site/veiculosAlterar&id=<?php echo $getVeiculo["id"];?>'>alterar</a>
                <a href='?router=Site/veiculos/&tiporequisicao=excluir&id=<?php echo $getVeiculo["id"];?>'>excluir</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>