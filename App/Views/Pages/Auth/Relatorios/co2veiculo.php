<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1 class="title" style="float: left;margin-left: 42%">CO2 Veículo</h1>


<br><br><br><br>

<form action="#" method="POST">
    <div class="inputs">
        <div class="input-row">
            <label for="">De </label>
            <input name="data_inicio" type="date" disabled value="<?php echo $vars["getIntervaloData"]["inicio"];?>">
        </div>
        <div class="input-row">
            <label for="">Até </label>
            <input name="data_fim" type="date" disabled value="<?php echo $vars["getIntervaloData"]["fim"];?>">
        </div>
    </div>
</form>

<?php if (!empty($vars["getData"])) { ?>
    <table>
        <tr>
            <th>Veículo</th>
            <th>CO2</th>
        </tr>
        <?php
        foreach ($vars["getData"] as $linha) : ?>
            <tr>
                <td><?php echo $linha["placa"]; ?> / <?php echo $linha["marca"] ?> / <?php echo $linha["modelo"] ?></td>
                <td><?php echo ($linha["km_rodado"]* 0.75 * 3.7); ?> kg</td>
            </tr>
        <?php endforeach;
        ?>

    </table>
<?php } else { ?>
    <h3 style="text-align: center; font-size: 30px; color: #6D995D;">Resultado da busca: Nenhum registro cadastrado</h3>
<?php } ?>
</body>
</html>
