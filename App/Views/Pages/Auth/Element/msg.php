<?php
if (@$_SESSION["msgAdicionadoSucesso"] == true) {
    ?>
    <span class="msg-success">
            <p>Adicionado com sucesso!</p>
        </span>
    <?php
    $_SESSION["msgAdicionadoSucesso"] = false;
}
?>

<?php
if (@$_SESSION["msgAlteradoSucesso"] == true) {
    ?>
    <span class="msg-success">
            <p>Alterado com sucesso!</p>
    </span>
    <?php
    $_SESSION["msgAlteradoSucesso"] = false;
}
?>

<?php
if (@$_SESSION["msgRemovidoSucesso"] == true) {
    ?>
    <span class="msg-success">
        <p>Excluído com sucesso!</p>
    </span>
    <?php
    $_SESSION["msgRemovidoSucesso"] = false;
}
?>

<?php
if (@$_SESSION["msgAdicionadoErro"] == true) {
    ?>
    <span class="msg-error">
        <p><?php print_r($_SESSION["msgAdicionadoErro"][2]);?></p>
    </span>
    <?php
    $_SESSION["msgAdicionadoErro"] = false;
}
?>

<?php
if (@$_SESSION["msgAlteradoErro"] == true) {
    ?>
    <span class="msg-error">
            <p><?php print_r($_SESSION["msgAlteradoErro"][2]);?></p>
        </span>
    <?php
    $_SESSION["msgAlteradoErro"] = false;
}
?>

<?php
if (@$_SESSION["msgRemovidoErro"] == true) {
    ?>
    <span class="msg-error">
            <p><?php print_r($_SESSION["msgRemovidoErro"][2]);?></p>
        </span>
    <?php
    $_SESSION["msgRemovidoErro"] = false;
}
?>


