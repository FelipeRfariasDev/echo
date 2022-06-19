<?php include("header.php");?>
<?php include("Element/nav-menu-autenticado.php");?>
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