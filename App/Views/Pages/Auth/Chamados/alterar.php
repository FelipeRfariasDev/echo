<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1 class="title">Alterar <?php echo $vars["nameController"];?></h1>
<a style="color: white;" href='/<?php echo $vars["nameController"];?>/index'><span class="btncrud">< Voltar</span></a>

<form action="/<?php echo $vars["nameController"];?>/alterar/<?php echo $vars["getData"]["id"];?>" method="POST">
    <section class="formulario">
        <div class="inputs">
            <div class="input-row">
                <label for="">Km rodado</label>
                <input autocomplete="off" name="km_rodado" type="text" value="<?php echo $vars["getData"]["km_rodado"];?>" placeholder="Digite Km rodado" required>

                <label for="">Funcionários</label>
                <select name="funcionario_id" required style="width: 25vw!important;
    height: 6vh!important;
    margin: 1vw!important;
    border-radius: 10px!important;
    border-color: #6D995D!important;
    font-size: 20px!important;
    text-align: center!important;
    color: #405936!important">
                    <option value="">Seleciona um Funcionário</option>
                    <?php foreach ($vars["getFuncionarios"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>" <?php if($vars["getData"]["funcionario_id"]==$linha["id"]) echo "selected";?>><?php echo $linha["nome"];?> / <?php echo $linha["cpf"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-row">
                <label for="">Veículo</label>
                <select name="veiculo_id" required style="width: 25vw!important;
    height: 6vh!important;
    margin: 1vw!important;
    border-radius: 10px!important;
    border-color: #6D995D!important;
    font-size: 20px!important;
    text-align: center!important;
    color: #405936!important">
                    <option value="">Seleciona um Veículo</option>
                    <?php foreach ($vars["getVeiculos"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>" <?php if($vars["getData"]["veiculo_id"]==$linha["id"]) echo "selected";?>><?php echo $linha["placa"];?> / <?php echo $linha["marca"];?> / <?php echo $linha["modelo"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input type="submit" value="Alterar" class="btncrud" />
    </section>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>