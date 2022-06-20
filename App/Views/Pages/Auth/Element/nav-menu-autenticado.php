<!--================== HEADER ==================-->
<header>
    <nav class="navbar">
        <div class="nav-menu">
            <div class="logo">
                <a href="/Site/principal/"><img src="/public/assets/svg/Logo.svg" style="width: 150px;margin-left: 100%;" alt="Echo"></a>
            </div>
            <div class="burger"><img src="/public/assets/svg/burg.svg"></div>
            <?php
                $REQUEST_URI = ($_SERVER["REQUEST_URI"]);
                $url = explode("/",$REQUEST_URI);

                $nome_controller = $url[1];
                $nome_action = $url[2];
            ?>
            <ul class="nav-list">
                <li><a href="/Veiculos/index/" class="nav-link" <?php if($nome_controller=="Veiculos") echo "style='background-color:#95bb87'";?>>Veiculos</a></li>
                <li><a href="/Site/funcionarios/" <?php if($nome_controller=="Site" && $nome_action=="funcionarios") echo "style='background-color:#95bb87'";?> class="nav-link">Integrantes</a></li>
                <li><a href="/Site/chamados/" <?php if($nome_controller=="Site" && $nome_action=="chamados") echo "style='background-color:#95bb87'";?> class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Chamados</a></li>
                <li><a href="/Relatorios/index/" <?php if($nome_controller=="Relatorios") echo "style='background-color:#95bb87'";?> class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Relatórios</a></li>
            </ul>
        </div>
        <?php if(@$_SESSION["usuario"]["id"]){?>

            <div class="notification is-success">
                <p>Olá <strong><?php echo $_SESSION["usuario"]["razao_social"];?></strong></p>
            </div>
            <a href="/Usuarios/logout/" class="btnAcessar">Sair</a>
        <?php }?>
    </nav>
</header>