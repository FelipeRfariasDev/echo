<?php
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/Element/nav-menu-autenticado.php");
?>

            <h1>Veiculos Novo <a href='?router=Site/veiculos'>< voltar</a></h1>


            <?php
            if (!empty($_SESSION["msgVeiculoRemovidoSucesso"]) && $_SESSION["msgVeiculoRemovidoSucesso"]==true) {
                ?>
                <div class="notification is-success">
                    <p>Veículo removido com sucesso!</p>
                </div>
                <?php
                $_SESSION["msgVeiculoRemovidoSucesso"]=false;
            }
            ?>
            <form action="" method="POST">
                <input type="hidden" value="novo" name="tiporequisicao">

                <label for="placa">placa</label>
                <input name="placa" type="text">

                <label for="marca">marca</label>
                <input name="marca" type="text">

                <label for="autonomia">autonomia</label>
                <input name="autonomia" type="text">

                <button type="submit" class="">Novo</button>

            </form>


<?php include($_SERVER["DOCUMENT_ROOT"]."/echo/App/Views/Pages/Auth/footer.php");?>