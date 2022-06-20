<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

            <h1>Veiculos Alterar <a href='?router=Site/veiculos'>< voltar</a></h1>

            <form action="" method="POST">
                <input type="hidden" value="update" name="tiporequisicao">
                <input type="hidden" value="<?php echo $_SESSION["getByIdVeiculo"]["id"];?>" name="id">
                <label for="placa">placa</label>
                <input name="placa" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["placa"];?>">

                <label for="marca">marca</label>
                <input name="marca" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["marca"];?>">

                <label for="autonomia">autonomia</label>
                <input name="autonomia" type="text" value="<?php echo $_SESSION["getByIdVeiculo"]["autonomia"];?>">

                <button type="submit" class="">Atualizar</button>

            </form>


<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>