<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>
    <h1 class="title" style="float: left;margin-left: 42%">Relatórios</h1>
<br><br><br>

<form action="/<?php echo $vars["nameController"];?>/index" method="POST">
    <div class="inputs">
        <div class="input-row">
            <label for="">Tipo</label>
            <select name="tipo_relatorio" required>
                <option value="">Selecione</option>
                <option value="km_rodado_veiculo">KM Rodado Veiculo</option>
                <option value="consumo_veiculo_funcionario">Consumo de Veiculo por Funcionário</option>
                <option value="consumo_km_funcionario">Consumo KM por Funcionário</option>
            </select>
            <?php
            $data_inicio = new DateTime("-31 days");
            $data_inicio_formatada =  $data_inicio->format('Y-m-d');
            ?>
            <label for="">Data Inicio</label>
            <input autocomplete="off" name="data_inicio" value="<?php echo $data_inicio_formatada ?>" type="date" required>
            <label for="">Data Fim</label>
            <?php
            $data_fim = new DateTime();
            $data_fim_formatada =  $data_fim->format('Y-m-d');
            ?>
            <input autocomplete="off" name="data_fim" type="date" value="<?php echo $data_fim_formatada ?>" required>
        </div>
    </div>
    <span class="inputs"><input type="submit" value="Gerar" class="btncrud" /></span>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>
</body>
</html>
