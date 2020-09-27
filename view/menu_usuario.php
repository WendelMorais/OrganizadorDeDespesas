
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Menu Principal</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">
<?php
    session_start();
    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
    {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    }

    $logado = $_SESSION['login'];
?>
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
                    <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
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
        <a href="cadastrar_dados.php" class="list-group-item list-group-item-action bg-light">Cadastrar Dados</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Ver Despesas</a>
        <a href="listar_usuarios.php" class="list-group-item list-group-item-action bg-light">Listar Usuários</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

      <div class="container-fluid text-center">
        <h1 class="mt-4 ">Bem-vindo ao Sistema de Despesas</h1>
        <p>Essa página esta sendo contruida para ser uma sistema de despesas pessoas, onde o usuario cadastra os valores e pode ir acompanhando suas economias mês a mês</p>
        <p>Presente trabalho sendo desenvolvida durante a matéria de Linguagens de Programação, ministrada pelo Profº Rodrigo Antoniazzi. Desenvolvimento Wendel Moura.</p>
          <p>Para utilização do sistema, selecione alguma opção no side-bar da esquerda. Obrigado!</p>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
  </script>

</body>

</html>
