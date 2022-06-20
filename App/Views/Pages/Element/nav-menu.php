<header>
    <nav class="navbar">
        <div class="nav-menu">
            <div class="logo">
                <a href="/Site/home/"><img src="/public/assets/svg/Logo.svg" style="width: 150px;margin-left: 100%;" alt="Echo"></a>
            </div>
            <div class="burger"><img src="/public/assets/svg/burg.svg"></div>

            <?php
            $REQUEST_URI = ($_SERVER["REQUEST_URI"]);
            $url = explode("/",$REQUEST_URI);

            $nome_controller = $url[1];
            if(empty($nome_controller)) $nome_controller = "Site";
            if(!empty($url[2])) $nome_action = $url[2];

            if(empty($nome_action)) $nome_action = "home";

            ?>

            <ul class="nav-list">
                <li><a href="https://github.com/LuanODias-mvc" class="nav-link" target="_blank" style="border-bottom-left-radius: 40px; border-top-left-radius: 40px;">GitHub</a></li>
                <li><a href="/Site/home/" <?php if($nome_controller=="Site" && $nome_action=="home") echo "style='background-color:#95bb87'";?> class="nav-link">Home</a></li>
                <li><a href="/Site/integrantes/" <?php if($nome_controller=="Site" && $nome_action=="integrantes") echo "style='background-color:#95bb87'";?> class="nav-link">Integrantes</a></li>
                <li><a href="/Site/carbono/" <?php if($nome_controller=="Site" && $nome_action=="carbono") echo "style='background-color:#95bb87'";?> class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Carbono</a></li>
            </ul>
        </div>
        <a href="/Usuarios/login" class="btnAcessar">Acesse já</a>
    </nav>
</header>