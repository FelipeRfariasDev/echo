<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>
    <h1 class="title" style="float: left;margin-left: 42%"><?php echo $vars["nameController"];?> <a href="/<?php echo $vars["nameController"];?>/novo"></h1>
    <span style=""><img style="width:1%!important;display: unset!important;align-items: center;margin-left: 10px;margin-top: 30px;" src="/public/assets/img/add.png" alt=""></a></span>
    <br><br><br><br>

    <?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/msg.php");?>

    <form action="/<?php echo $vars["nameController"];?>/index" method="POST">
        <input type="hidden" name="acao" value="buscar">
        <div class="inputs">
            <div class="input-row">
                <label for="">Km rodado</label>
                <input autocomplete="off" name="km_rodado" type="text" placeholder="Digite Km rodado para pesquisar na tabela">

                <label for="">Funcionários</label>
                <select name="funcionario_id">
                    <option value="">Seleciona um Funcionário para pesquisar na tabela</option>
                    <?php foreach ($vars["getFuncionarios"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>"><?php echo $linha["nome"];?> / <?php echo $linha["cpf"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-row">
                <label for="">Veículo</label>
                <select name="veiculo_id">
                    <option value="">Seleciona um Veículo para pesquisar na tabela</option>
                    <?php foreach ($vars["getVeiculos"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>"><?php echo $linha["placa"];?> / <?php echo $linha["marca"];?> / <?php echo $linha["modelo"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <span class="inputs"><input type="submit" value="Pesquisar" class="btncrud" /></span>
    </form>

    <?php if (!empty($vars["getData"])) { ?>
        <table>
            <tr>
                <th>Km rodado</th>
                <th>Data</th>
                <th>Co2</th>
                <th>Funcionario</th>
                <th>Veiculo</th>
                <th>Disponível</th>
                <th></th>
            </tr>
            <?php
            foreach ($vars["getData"] as $linha) : ?>
                <tr>
                    <td><?php echo $linha["km_rodado"]; ?></td>
                    <td><?php echo date_format(date_create($linha["data"]), 'd/m/Y'); ?></td>
                    <td><?php echo ($linha["km_rodado"]* 0.75 * 3.7); ?> kg</td>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["placa"]; ?></td>
                    <td><?php echo $linha["disponivel"]; ?></td>
                    <td>
                        <div class="ud">
                        <a href='/<?php echo $vars["nameController"];?>/alterar/<?php echo $linha["id"]; ?>'><img style="width: 56px; height: 56px;" src="/public/assets/svg/edit.svg" alt=""></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
            ?>

        </table>
    <?php } else { ?>
        <h3 style="text-align: center; font-size: 30px; color: #6D995D;">Resultado da busca: Nenhum registro cadastrado</h3>
    <?php } ?>
</body>
</html>