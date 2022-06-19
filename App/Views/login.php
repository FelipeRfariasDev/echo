<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo - Gerenciamento de frotas ecológico</title>

    <!--================== LINKS ==================-->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">


</head>

<body>
    <!--================== HEADER ==================-->
    <header>
        <nav class="navbar">
            <div class="nav-menu">
                <div class="logo">
                    <a href="index.php"><img src="public/assets/svg/Logo.svg" alt="Echo"></a>
                </div>
                <div class="burger"><img src="public/assets/svg/burg.svg"></div>
                <ul class="nav-list">
                    <li><a href="https://github.com/LuanODias/Echo-mvc" class="nav-link" style="border-bottom-left-radius: 40px; border-top-left-radius: 40px;">Projeto</a></li>
                    <li><a href="?router=Site/integrantes/" class="nav-link">Integrantes</a></li>
                    <li><a href="?router=Site/carbono/" class="nav-link" style="border-bottom-right-radius: 40px; border-top-right-radius: 40px;">Carbono</a></li>
                </ul>
            </div>
            <a href="?router=Site/principal/" class="btnAcessar">Acesse já</a>
        </nav>
    </header>



    <!--================== CONTAINER ==================-->

    <section class="container">
            <div class="container-left">
                <h1>Registre-se Gratuitamente</h1>
                <p>gerencie sua empresa pensando verde!</p>
                <?php
                if ($_SESSION["cadastroSuccess"]==true) {
                ?>
                    <div class="notification is-success">
                        <p>Cadastro realizado com sucesso!</p>
                    </div>
                <?php
                    $_SESSION["cadastroSuccess"]=false;
                }
                ?>
                <form action="" method="POST">
                    <input type="hidden" value="novo" name="tiporequisicao">
                    <div class="format">
                        <div class="first-row">
                            <div class="column">
                                <label for="cnpj">CNPJ</label>
                                <input name="cnpj" type="text" required>
                            </div>

                            <div class="column">
                                <label for="razao_social">Razão Social</label>
                                <input name="razao_social" type="text" required>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="column">
                                <label for="email">Endereço de e-mail</label>
                                <input name="email" type="email" required>
                            </div>
                            <div class="column">
                                <label for="senha">Senha</label>
                                <input name="senha" type="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="button">
                        <button type="submit" class="btncadastro">Cadastre-se já</button>
                        <p>Ao criar uma conta, você declara que possui mais de 16 anos de idade e está de acordo com os <a href="#" style="color: blue;">Termos de Serviço</a> & <a href="#" style="color: blue;">Política de Privacidade</a>.</p>
                    </div>
            </div>
            </form>

            <form action="" method="POST">
                <input type="hidden" value="login" name="tiporequisicao">
                <div class="container-login">
                    <div class="linha"></div>
                    <div class="menu-login">
                        <h1>Iniciar sessão</h1>
                        <p>Já possui uma conta? Faça login aqui embaixo.</p>
                        <?php
                        if ($_SESSION["cadastroErros"]==true) {
                        ?>
                            <div class="notification is-success">
                                <p>Email ou senha incorretos!</p>
                            </div>
                        <?php
                            $_SESSION["cadastroErros"]=false;
                        }
                        ?>
                        <div class="input-login">
                            <div class="login-row">
                                <div class="row">
                                    <label for="usuarui">Email</label>
                                    <input name="email" name="text" class="input is-large" autofocus="">
                                </div>
                                <div class="row">
                                    <div class="input-row">
                                        <label for="senha" id="password">Senha</label>
                                    </div>
                                    <input name="senha" class="input is-large" type="password">
                                </div>
                            </div>
                            <div class="buttonlogin">
                                <button type="submit" class="btnlogin">Iniciar sessão</button>
                                <p>Problemas para entrar na sua conta? Certifique que seu navegador está com Javascript e cookies habilitados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>
    <img src="public/assets/svg/Wave.svg" alt="Wave" class="wave" style="position: fixed; bottom: -90px;">
</body>

</html>