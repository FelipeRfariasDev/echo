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
                <li><a href="/Site/home/" <?php if($nome_controller=="Site" && $nome_action=="home") echo "style='background-color:#6D995D; color: white'";?> class="nav-link">Home</a></li>
                <li><a href="https://github.com/LuanODias-mvc" class="nav-link" target="_blank">GitHub</a></li>
                <li><a href="/Site/integrantes/" <?php if($nome_controller=="Site" && $nome_action=="integrantes") echo "style='background-color:#6D995D'";?> class="nav-link">Integrantes</a></li>
                <li><a href="/Site/carbono/" <?php if($nome_controller=="Site" && $nome_action=="carbono") echo "style='background-color:#6D995D'";?> class="nav-link">Carbono</a></li>
            </ul>
        </div>
        <a href="/Usuarios/login" class="btnAcessar">Acesse já</a>
    </nav>
</header>