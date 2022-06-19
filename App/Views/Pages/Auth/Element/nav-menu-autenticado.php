<!--================== HEADER ==================-->
<header>
    <nav class="navbar">
        <div class="nav-menu">
            <div class="logo">
                <a href="index.php"><img src="/echo/public/assets/svg/Logo.svg" alt="Echo"></a>
            </div>
            <div class="burger"><img src="/echo/public/assets/svg/burg.svg"></div>
            <ul class="nav-list">
                <li><a href="?router=Site/veiculos/" class="nav-link">Veiculos</a></li>
                <li><a href="?router=Site/funcionarios/" class="nav-link">Integrantes</a></li>
                <li><a href="?router=Site/chamados/" class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Chamados</a></li>
                <li><a href="?router=Site/relatorios/" class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Relatórios</a></li>
            </ul>
        </div>
        <?php if($_SESSION["usuario"]["id"]){?>

            <div class="notification is-success">
                <p>Olá <strong><?php echo $_SESSION["usuario"]["razao_social"];?></strong></p>
            </div>



            <a href="?router=Site/logout/" class="btnAcessar">Sair</a>

        <?php }?>

    </nav>
</header>