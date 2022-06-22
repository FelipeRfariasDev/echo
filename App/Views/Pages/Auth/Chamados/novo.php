<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

<h1 class="title">Cadastro de <?php echo $vars["nameController"];?></h1>

<a style="color: white;" href='/<?php echo $vars["nameController"];?>/index'><span class="btncrud">< Voltar</span></a>

<form action="/<?php echo $vars["nameController"];?>/novo" method="POST">
    <section class="formulario">
        <div class="inputs">
            <div class="input-row">
                <label for="">Km rodado</label>
                <input autocomplete="off" name="km_rodado" type="text" placeholder="Digite Km rodado" required>

                <label for="">Funcionários</label>
                <select name="funcionario_id" required>
                    <option value="">Seleciona um Funcionário</option>
                    <?php foreach ($vars["getFuncionarios"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>"><?php echo $linha["nome"];?> / <?php echo $linha["cpf"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-row">
                <label for="">Veículo</label>
                <select name="veiculo_id" required>
                    <option value="">Seleciona um Veículo</option>
                    <?php foreach ($vars["getVeiculos"] as $linha) : ?>
                        <option value="<?php echo $linha["id"];?>"><?php echo $linha["placa"];?> / <?php echo $linha["marca"];?> / <?php echo $linha["modelo"];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input type="submit" value="Salvar" class="btncrud" />
    </section>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/footer.php"); ?>