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
    <?php include("header.php");?>
    <div class="container-principal">

    <section class="formulario">
        <div class="inputs">
            <label for="">Nome</label>
            <input type="text">

            <label for="">Cpf</label>
            <input type="text">
        </div>
        <div class="btncrud">
            <button>Cadastrar</button>

            <button>Editar</button>

            <button>Excluir</button>

            <button>Procurar</button>
        </div>

        <table>
            <tr>
                    <td>ID</td>

                    <td>Cpf</td>

                    <td>Nome</td>
            </tr>
        </table>



    </section>
    </div>
    <?php include("footer.php");?>
</body>
</html>