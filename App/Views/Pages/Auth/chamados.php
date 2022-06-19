<?php include("header.php");?>
<?php include("Element/nav-menu-autenticado.php");?>
    <div class="container-principal">

    <section class="formulario">
        <div class="inputs">
            <label for="">Km rodado</label>
            <input type="text">

            <label for="">Funcionario</label>
            <input type="text">

            <label for="">Veiculo</label>
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

                    <td>Km rodado</td>

                    <td>Data</td>

                    <td>Co2</td>

                    <td>Funcionario</td>

                    <td>Veiculo</td>
            </tr>
        </table>
    </section>
    </div>
<?php include("footer.php");?>