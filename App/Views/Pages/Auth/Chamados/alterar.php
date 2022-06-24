<?php
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

    <h1 class="title">Alterar <?php echo $vars["nameController"];?></h1>

    <a style="color: white;" href='/<?php echo $vars["nameController"];?>/index'><span class="btncrud">< Voltar</span></a>

    <form action="/<?php echo $vars["nameController"];?>/alterar/<?php echo $vars["getById"]["id"];?>" method="POST">
        <section class="formulario">
            <div class="inputs">
                <div class="input-row">
                    <label for="">Km rodado</label>
                    <input autocomplete="off" name="km_rodado" type="text" value="<?php echo $vars["getById"]["km_rodado"];?>" placeholder="Digite Km rodado" required>
                    <label for="">Funcionários</label>
                    <select name="funcionario_id" required>
                        <option value="">Seleciona um Funcionário</option>
                        <?php foreach ($vars["getFuncionarios"] as $linha) : ?>
                            <option value="<?php echo $linha["id"];?>" <?php if($linha["id"] && $vars["getById"]["funcionario_id"]) echo "selected"; ?>><?php echo $linha["nome"];?> / <?php echo $linha["cpf"];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-row">
                    <label for="">Veículo</label>
                    <select name="veiculo_id" required>
                        <option value="">Seleciona um Veículo</option>
                        <?php foreach ($vars["getVeiculos"] as $linha) : ?>
                            <option value="<?php echo $linha["id"];?>" <?php if($linha["id"] && $vars["getById"]["veiculo_id"]) echo "selected"; ?>><?php echo $linha["placa"];?> / <?php echo $linha["marca"];?> / <?php echo $linha["modelo"];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-row">
                    <label for="">Disponível</label>
                    <select name="disponivel" required>
                        <option value="">Selecione</option>
                        <option value="S" <?php if($vars["getById"]["disponivel"]=="S") echo "selected";?>>SIM</option>
                        <option value="N" <?php if($vars["getById"]["disponivel"]=="N") echo "selected";?>>NÂO</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Salvar" class="btncrud" />
        </section>
    </form>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/footer.php"); ?>