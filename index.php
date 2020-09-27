<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">

    <title>Login</title>
</head>

<body>
<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand " href="#">Linguagens de Programação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100 order-6 " id="navbarNav">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item active ">
                    <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="view/menu_usuario.php">Cadastrar Produto</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Saldo Total</a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="login mx-auto col-xl-12 col-md-12 col-lg-12">
                <form class="form" method="post" action="php/validar_login.php">
                    <div class="card ">
                        <div class="text-center">
                            <h2>Faça o Login</h2>
                        </div>
                        <label class="campos">
                            <p><input class="inp" type="text" name="email" placeholder="Email"></p>
                        </label>

                        <label class="campos">
                            <p><input class="inp" type="password" name="senha" placeholder="Senha"></p>
                            <a><input type="submit" value="ENTRAR" name="entrar">
                                <button><a href="view/primeiro_acesso.php">Cadastrar</a></button>
                                <button><a href="view/recup_senha.php">Esqueci Senhar</a></button>
                        </label>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.5.1.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>

</html>