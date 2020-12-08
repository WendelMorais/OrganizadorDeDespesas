<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styleIndex.css">


    <title>Login</title>

    <?php  include "../view/Nav_bar.php"; ?>
</head>

<body>



<div class="col-12 ">
        <div class="login mx-auto">
            <form class="form" method="post" action="../php/envia_senha">
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
                           <button> <a href="primeiro_acesso">Cadastrar</a></button>
                            <button> <a href="../index">Voltar</a></button>

                    </label>
            </form>
        </div>
    </div>




    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>


</body>

</html>

