<?php
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>


    <h1 class="title">Alterar Veiculo</h1>


    <a style="color: white;" href='/Veiculos/index'><span class="btncrud">< Voltar</span></a>


<form action="Veiculos/alterar" method="POST">
    <input type="hidden" value="<?php echo $_SESSION["getByIdVeiculo"]["id"];?>" name="id">
    <section class="formulario">
        <div class="inputs">
            <div class="input-row">
                <label for="">Placa</label>
                <input autocomplete="off" name="placa" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["placa"];?>" required placeholder="Digite uma Placa para cadastrar na tabela">

                <label for="">Marca</label>
                <input autocomplete="off" name="marca" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["marca"];?>" required placeholder="Digite uma Marca para cadastrar na tabela">
            </div>

            <div class="input-row">
                <label for="">Modelo</label>
                <input autocomplete="off" name="modelo" type="text" required value="<?php echo $_SESSION["getByIdVeiculo"]["modelo"];?>" placeholder="Digite um Modelo para cadastrar na tabela">

                <label for="">Autonomia</label>
                <input autocomplete="off" name="autonomia" type="text" required value="<?php echo $_SESSION["getByIdVeiculo"]["autonomia"];?>" placeholder="Digite uma Autonomia para cadastrar na tabela">
            </div>
        </div>
        <input type="submit" value="Alterar" class="btncrud" />
    </section>
</form>

<?php include($_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/Auth/footer.php");?>