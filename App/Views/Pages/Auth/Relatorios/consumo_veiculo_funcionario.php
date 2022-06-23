<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>
<h1 class="title" style="float: left;margin-left: 20%">Qtd uso Veículo/Funcionário</h1>
<a style="color: white;" href='/<?php echo $vars["nameController"];?>/index'><span class="btncrud">< Voltar</span></a>

<label for="">De </label>
<input name="data_inicio" type="date" disabled value="<?php echo $vars["getIntervaloData"]["inicio"];?>">
<label for="">Até </label>
<input name="data_fim" type="date" disabled value="<?php echo $vars["getIntervaloData"]["fim"];?>">

<?php if (!empty($vars["getData"])) { ?>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Qtd de Utilização</th>
        </tr>
        <?php
        foreach ($vars["getData"] as $linha) : ?>
            <tr>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["cpf"]; ?></td>
                <td><?php echo $linha["qtd_consumo_veiculo_funcionario"]; ?></td>
            </tr>
        <?php endforeach;
        ?>

    </table>
<?php } else { ?>
    <h3 style="text-align: center; font-size: 30px; color: #6D995D;">Resultado da busca: Nenhum resultado cadastrado</h3>
<?php } ?>
</body>
</html>
