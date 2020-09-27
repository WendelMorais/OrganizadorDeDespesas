<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styleIndex.css">

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
                    <a class="nav-link" href="../index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
    </nav>
</section>


<div class="col-12 ">
        <div class="login mx-auto">
            <form class="form" method="post" action="../php/envia_senha.php">
                <div class="card ">
                    <div class="text-center">
                        <h2>Preencha os campos</h2>
                        <small id="emailHelp" class="form-text  text-dark">Recupere sua senha</small>
                    </div>
                    <label class="campos">
                        <p><input class="inp" type="text" name="cpf" required placeholder="CPF"> </p>
                    </label>

                    <label class="campos">
                        <p><input class="inp" type="text" name="email" required placeholder="Email"></p>
                        <a><input type="submit" value="Enviar" name="enviar">
                           <button> <a href="primeiro_acesso.php">Cadastrar</a></button>
                            <button> <a href="../index.php">Voltar</a></button>

                    </label>
            </form>
        </div>
    </div>




    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>


</body>

</html>

