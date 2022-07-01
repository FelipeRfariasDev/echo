<!--================== HEADER ==================-->
<header>
    <nav class="navbar" style="max-width: 1670px;">
        <div class="nav-menu" style="width: 900px;
    margin-top: -5px;">
            <div class="logo">
                <a href="/Site/principal/"><img src="/public/assets/svg/Logo.svg" style="width: 150px;margin-left: 70%;" alt="Echo"></a>
            </div>
            <div style="margin-left: -200px;"></div>
            <?php
                $REQUEST_URI = ($_SERVER["REQUEST_URI"]);
                $url = explode("/",$REQUEST_URI);

                $nome_controller = $url[1];
                $nome_action = $url[2];
            ?>
            <ul class="nav-list" style="height: 45px;
    border-radius: 10px;
    border: 0px solid #405936;
    /* -webkit-box-sizing: border-box; */
    /* box-sizing: border-box; */
    /* -webkit-box-shadow: 0px 4px 4px rgb(0 0 0 / 25%); */
    box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
    list-style: none;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-left: 17vw;
    margin-right: 10vw;
    /* -webkit-box-align: center; */
    -ms-flex-align: center;
    /* align-items: center;">
                <li><a href="/Veiculos/index/" class="nav-link" <?php if($nome_controller=="Veiculos") echo "style='background-color:#95bb87;border-radius: 10px!important'";?> style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;border-radius: 10px;">Veículos</a></li>
                <li><a href="/Funcionarios/index" <?php if($nome_controller=="Funcionarios") echo "style='background-color:#95bb87;border-radius: 10px!important'";?> class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;border-radius: 10px;">Funcionários</a></li>
                <li><a href="/Chamados/index/" <?php if($nome_controller=="Chamados") echo "style='background-color:#95bb87;border-radius: 10px!important'";?> class="nav-link">Chamados</a></li>
                <li><a href="/Relatorios/index/" <?php if($nome_controller=="Relatorios") echo "style='background-color:#95bb87;border-radius: 10px!important'";?> class="nav-link">Relatórios</a></li>

            </ul>
        </div>
        <?php if(@$_SESSION["usuario"]["id"]){?>

            <div class="notification is-success" style="margin-top: 30px;">
                <p>Olá <strong><?php echo $_SESSION["usuario"]["razao_social"];?></strong></p>
            </div>
            <a href="/Usuarios/logout/" class="btnAcessar" style="border: #405936 solid 0px;">Sair</a>
        <?php }?>
    </nav>
</header>