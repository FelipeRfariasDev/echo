<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>
    <h1 class="title" style="float: left;margin-left: 42%">Veículos <a href="/Veiculos/novo"></h1>
    <span style=""><img style="width:1%!important;display: unset!important;align-items: center;margin-left: 10px;margin-top: 30px;" src="/public/assets/img/add.png" alt=""></a></span>
    <br><br><br><br>
    <?php
    if (@$_SESSION["msgVeiculoAdicionadoSucesso"] == true) {
    ?>
        <span class="msg-success">
            <p>Veículo adicionado com sucesso!</p>
        </span>
    <?php
        $_SESSION["msgVeiculoAdicionadoSucesso"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoAlteradoSucesso"] == true) {
    ?>
    <span class="msg-success">
            <p>Veículo alterado com sucesso!</p>
    </span>
    <?php
        $_SESSION["msgVeiculoAlteradoSucesso"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoRemovidoSucesso"] == true) {
    ?>
    <span class="msg-success">
        <p>Veículo excluído com sucesso!</p>
    </span>
    <?php
        $_SESSION["msgVeiculoRemovidoSucesso"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoAdicionadoErro"] == true) {
        ?>
        <span class="msg-error">
            <p><?php print_r($_SESSION["msgVeiculoAdicionadoErro"][2]);?></p>
        </span>
        <?php
        $_SESSION["msgVeiculoAdicionadoErro"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoAlteradoErro"] == true) {
        ?>
        <span class="msg-error">
            <p><?php print_r($_SESSION["msgVeiculoAlteradoErro"][2]);?></p>
        </span>
        <?php
        $_SESSION["msgVeiculoAlteradoErro"] = false;
    }
    ?>

    <form action="/Veiculos/index" method="POST">
        <input type="hidden" name="acao" value="buscar">
        <div class="inputs">
            <div class="input-row">
                <label for="">Placa</label>
                <input autocomplete="off" name="placa" type="text" placeholder="Digite uma Placa para pesquisar na tabela">

                <label for="">Marca</label>
                <input autocomplete="off" name="marca" type="text" placeholder="Digite uma Marca para pesquisar na tabela">
            </div>

            <div class="input-row">
                <label for="">Modelo</label>
                <input autocomplete="off" name="modelo" type="text" placeholder="Digite um Modelo para pesquisar na tabela">

                <label for="">Autonomia</label>
                <input autocomplete="off" name="autonomia" type="text" placeholder="Digite uma Autonomia para pesquisar na tabela">
            </div>
        </div>
        <span class="inputs"><input type="submit" value="Pesquisar" class="btncrud" /></span>
    </form>

    <?php if (!empty($vars["getVeiculos"])) { ?>
        <table>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Autonomia</th>
                <th></th>
            </tr>
            <?php
            foreach ($vars["getVeiculos"] as $getVeiculo) : ?>
                <tr>
                    <td><?php echo $getVeiculo["placa"]; ?></td>
                    <td><?php echo $getVeiculo["marca"]; ?></td>
                    <td><?php echo $getVeiculo["modelo"]; ?></td>
                    <td><?php echo $getVeiculo["autonomia"]; ?></td>
                    <td>
                        <div class="ud">
                        <a href='/Veiculos/alterar/&id=<?php echo $getVeiculo["id"]; ?>'><img style="width: 56px; height: 56px;" src="/public/assets/svg/edit.svg" alt=""></a>
                        <a href='/Veiculos/excluir/&id=<?php echo $getVeiculo["id"]; ?>' onclick="javascript:return confirm('Tem certeza que deseja excluir?')"><img style="width: 45px; height: 45px;" src="/public/assets/svg/remove.svg"></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
            ?>

        </table>
    <?php } else { ?>
        <h3 style="text-align: center; font-size: 30px; color: #6D995D;">Resultado da busca: Nenhum veiculo cadastrado</h3>
    <?php } ?>
</body>
</html>