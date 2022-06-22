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
                <label for="">Placa</label>
                <input autocomplete="off" name="placa" type="text" required placeholder="Digite uma Placa para cadastrar na tabela">

                <label for="">Marca</label>
                <input autocomplete="off" name="marca" type="text" required placeholder="Digite uma Marca para cadastrar na tabela">
            </div>

            <div class="input-row">
                <label for="">Modelo</label>
                <input autocomplete="off" name="modelo" type="text" required placeholder="Digite um Modelo para cadastrar na tabela">

                <label for="">Autonomia</label>
                <input autocomplete="off" name="autonomia" type="text" required placeholder="Digite uma Autonomia para cadastrar na tabela">
            </div>
        </div>
        <input type="submit" value="Salvar" class="btncrud" />
    </section>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/App/Views/Pages/Auth/footer.php"); ?>