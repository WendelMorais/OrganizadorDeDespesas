<?php

include("config.php");

$cod_usuario = $_GET["cod_usuario"];



$busca_usuario = "select * from usuario where cod_usuario = $cod_usuario";
$busca_usuario = mysqli_query($conectou, $busca_usuario);
$busca_usuario = mysqli_fetch_array($busca_usuario);

?>
<!--<html>-->
<!--    <head>-->
<!--        <title></title>-->
<!--    </head>-->
<!--<body>-->
<!--	<form ....action="salvar_edicao.php" method="post">-->
<!--    <input type="hidden" name="cod_usuario" value="--><?php //echo $busca_usuario['cod_usuario']; ?><!--"-->
<!--    <label>Nome</label>-->
<!--    <input type="text" name="nome" value="--><?php //echo $busca_usuario['nome']; ?><!--">-->
<!--    <br>-->
<!--    <label>CPF</label>-->
<!--    <input type="text" name="cpf" value="--><?php //echo $busca_usuario['cpf']; ?><!--">-->
<!--    <br>-->
<!--    <label>OBS</label>-->
<!--    <textarea name="obs" cols="50" rows="10">--><?php //echo $busca_usuario['nome'];?><!--</textarea>-->
<!--    <br>-->
<!--    <label>Data de Nascimento</label>-->
<!--    <input type="date" name="data_nasc" value="--><?php //echo $busca_usuario['data_nasc']; ?><!--">-->
<!--	<input type="submit" name="enviar" value="Alterar">-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Dados</title>

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
                    <a class="nav-link" href="../view/menu_usuario.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
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
                <a href="../view/cadastrar_dados.php" class="list-group-item list-group-item-action bg-light text-dark">Cadastrar Dados</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Ver Despesas</a>
                <li class="list-group">
                    <a href="../view/listar_usuarios.php" class="list-group-item list-group-item-action  bg-dark text-light">Listar dados</a>
                    <ul>
                        <li class="list-group-item list-group-item-action  text-dark my-2" >
                            <span>Editar Usuário</span>
                    </ul>
                </li>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>


        <div class="container-fluid ">
            <h1 class="mt-4 text-center">Editar Usuário</h1>
            <div class="col">
                <h3 class="text-center"><?php echo $busca_usuario['nome']; ?></h3>
            </div>


            <div class="dados border border-warning p-3">
                <div class="row">
                    <div class="col-12 ">
                        <form action="salvar_edicao.php" method="post">
                            <input type="hidden" name="cod_usuario" value="--><?php echo $busca_usuario['cod_usuario']; ?><!--"-->
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group ">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $busca_usuario['nome']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" value="<?php echo $busca_usuario['cpf']; ?>" >
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="data">Data de Nascimento:</label>
                                    <input type="date" class="form-control" name="data" value="<?php echo $busca_usuario['data_nasc']; ?>">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-info text-light " type="submit" value="Alterar">Salvar</button>
                            </div>
                        </form>
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