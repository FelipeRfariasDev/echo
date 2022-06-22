<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>
    <h1 class="title" style="float: left;margin-left: 42%">Relatórios</h1>
<br><br><br>
<form action="/<?php echo $vars["nameController"];?>/index" method="POST">
    <input type="hidden" name="acao" value="buscar">
    <div class="inputs">
        <div class="input-row">
            <label for="">Tipo</label>
            <select name="tipo_relatorio">
                <option value="">Selecione</option>
                <option value="km_veiculo_rodado">KM Veiculo Rodado</option>
            </select>
            <label for="">Data Inicio</label>
            <input autocomplete="off" name="data_inicio" type="date">
            <label for="">Data Fim</label>
            <input autocomplete="off" name="data_fim" type="date">
        </div>
    </div>
    <span class="inputs"><input type="submit" value="Gerar" class="btncrud" /></span>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>
</body>
</html>
