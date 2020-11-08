<?php

include "../php/config.php";


session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo "<script>alert('usuario não conectado');</script>";
    header('location: ../index.php');
}

$logado = $_SESSION['email'];


$query = "select nome from usuario where email = '$logado' ";

$consulta = mysqli_query($conectou,$query);

$valor =  mysqli_fetch_array($consulta);


$usuario1 = $valor['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listar Usuarios</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
        <button class="btn btn-light " id="menu-toggle">Ocultar menu lateral</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="menu_usuario.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php echo $usuario1 ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Preferencias</a>
                        <a class="dropdown-item" href="#">Sair</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Linguagens de Programação</div>
            <div class="list-group list-group-flush">
                <a href="cadastrar_dados.php" class="list-group-item list-group-item-action bg-light text-dark">Cadastrar Dados</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Ver Despesas</a>
                <a href="listar_usuarios.php" class="list-group-item list-group-item-action bg-light bg-dark text-light">Listar Usuarios</a>
                <a href="Listar_Produtos.php" class="list-group-item list-group-item-action bg-light">Produtos Cadastrados</a>
                <a href="graficos.php" class="list-group-item list-group-item-action bg-light">Gráficos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>




        <div class="container-fluid ">
            <h1 class="mt-4 text-center">Lista de Clientes</h1>


            <div class=" border border-warning p-3">
                <div class="row"
                <div class="col-12 ">
                    <section>
                        <div class="col-md-12 offset-md-3">
                            <div class=" text-center">

                                <?php

                                $buscar_dados = "select * from usuario order by nome ASC";
                                $buscar_dados = mysqli_query($conectou, $buscar_dados);
                                while ($linha = mysqli_fetch_array($buscar_dados)) {
                                    $cod_usuario = $linha["cod_usuario"]; //$linha[0];
                                    $nome = $linha["nome"];//$linha[1];
                                    $cpf = $linha["cpf"];
                                    $telefone = $linha["telefone"];
                                    $email = $linha["email"];

                                    echo "  <div class='row'>
                                                    <div class='col-md-12 offset-md-3'>
                                                          <label for='produto'>Nome($linha[0]):</label></br>
                                                          <input type='text' class='form-control' maxlength='100' name='nome' value='$nome'>  
                                                   </div>
                                                   
                                                    <div class='col-md-12 offset-md-3'>
                                                           <label for='cpf'>CPF:</label>
                                                           <input type='number' class='form-control' name='cpf' value='$cpf' >
                                                    </div>
                                            </div>
                                            <div class='row'>
                                                    <div class='col-md-12 offset-md-3'>
                                                       <label for='telefone'>Telefone:</label>
                                                        <input type='number' class='form-control' name='telefone' value='$telefone'>
                                                    </div>
                                                    
                                                    <div class='col-md-12 offset-md-3'>
                                                        <label for='email'>Email:</label>
                                                        <input type='text' class='form-control' name='email' value='$email'>
                                                    </div>
                                                       <br/>
                                                    <div class='text-center'>  
                                                        <a href='../view/editar_usuario.php?cod_usuario=$cod_usuario'><button  class='btn btn-info text-light' type='submit'>Editar</button></a>
                                                        <a href='../php/excluir_usuario.php?cod_usuario=$cod_usuario'<button  class='btn btn-warning text-light' type='submit'>Excluir</button></a>
                                                        <hr>
                                                    </div>  
                                           </div>";
                                }
                                ?>
                            </div>
                        </div>

                    </section>
                </div>

            </div>


        </div>
        <!--next-->
    </div>

</div>
</div>


<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
