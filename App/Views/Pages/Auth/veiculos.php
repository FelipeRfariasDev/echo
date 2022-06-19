<?php include("header.php");?>
<?php include("Element/nav-menu-autenticado.php");?>
    <div class="container-principal">
    <section class="formulario">
        <div class="inputs">
            <label for="">Placa</label>
            <input type="text">

            <label for="">Marca</label>
            <input type="text">

            <label for="">Modelo</label>
            <input type="text"> 

            <label for="">Autonomia</label>
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

                    <td>Marca</td>

                    <td>Placa</td>

                    <td>Modelo</td>

                    <td>Autonomia</td>
            </tr>
        </table>



    </section>

    </div>
<?php include("footer.php");?>