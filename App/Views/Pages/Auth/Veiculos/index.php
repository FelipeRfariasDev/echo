<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<section class="formulario">
    <h1 class="title">Veículos</h1>

    <?php
    if (@$_SESSION["msgVeiculoAdicionadoSucesso"] == true) {
    ?>
        <div class="notification is-success" style="color:#6D995D;text-decoration-line: underline; text-align: center;">
            <p>Veículo adicionado com sucesso!</p>
        </div>
    <?php
        $_SESSION["msgVeiculoAdicionadoSucesso"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoAlteradoSucesso"] == true) {
    ?>
        <div class="notification is-success" style="color: #6D995D;text-decoration-line: underline; text-align: center;">
            <p>Veículo alterado com sucesso!</p>
        </div>
    <?php
        $_SESSION["msgVeiculoAlteradoSucesso"] = false;
    }
    ?>

    <?php
    if (@$_SESSION["msgVeiculoRemovidoSucesso"] == true) {
    ?>
        <div class="notification is-success" style="color: #6D995D;text-decoration-line: underline; text-align: center;">
            <p>Veículo excluído com sucesso!</p>
        </div>
    <?php
        $_SESSION["msgVeiculoRemovidoSucesso"] = false;
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

        <div class="btncrud">
            <button type="submit" >Procurar</button>
    </form>
    <button><a href="/Veiculos/novo" style="color: white;" >Adicionar +</a></button>
    </div>

    <?php if (!empty($_SESSION["getVeiculos"])) { ?>
        <table>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Autonomia</th>
                <th>Ações</th>
            </tr>
            <?php
            foreach ($_SESSION["getVeiculos"] as $getVeiculo) : ?>
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
    <?php include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/footer.php"); ?>
</section>
<img style="z-index: -1;" src="/public/assets/svg/Wave.svg" alt="Wave" class="wavecarbono">
</body>

</html>