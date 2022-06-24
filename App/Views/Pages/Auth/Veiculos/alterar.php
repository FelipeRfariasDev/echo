<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>


    <h1 class="title">Alterar <?php echo $vars["nameController"];?></h1>


    <a style="color: white;" href='/<?php echo $vars["nameController"];?>/index'><span class="btncrud">< Voltar</span></a>


<form action="/<?php echo $vars["nameController"];?>/alterar/<?php echo $vars["getById"]["id"];?>" method="POST">
    <section class="formulario">
        <div class="inputs">
            <div class="input-row">
                <label for="">Placa</label>
                <input autocomplete="off" name="placa" type="text" value="<?php echo $vars["getById"]["placa"];?>" required placeholder="Digite uma Placa para cadastrar na tabela">

                <label for="">Marca</label>
                <input autocomplete="off" name="marca" type="text" value="<?php echo $vars["getById"]["marca"];?>" required placeholder="Digite uma Marca para cadastrar na tabela">
            </div>

            <div class="input-row">
                <label for="">Modelo</label>
                <input autocomplete="off" name="modelo" type="text" required value="<?php echo $vars["getById"]["modelo"];?>" placeholder="Digite um Modelo para cadastrar na tabela">

                <label for="">Autonomia</label>
                <input autocomplete="off" name="autonomia" type="text" required value="<?php echo $vars["getById"]["autonomia"];?>" placeholder="Digite uma Autonomia para cadastrar na tabela">
            </div>
        </div>
        <input type="submit" value="Alterar" class="btncrud" />
    </section>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>