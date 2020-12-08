<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_primeiro.css">
    <title>Cadastro</title>

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
                                <a class="nav-link" href="../index">Inicio<span class="sr-only">(current)</span></a>
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

        <div class="container">
        <div class="row">
            <div class="col-12 my-5 text-center">
                <div class="header">
                    <h2>Cadastre-se para ter acesso</h2>
                    <span>Sejas bem-vindo, para poder acessar a plataforma por favor cadastre-se com suas informações abaixo.</span>
                </div>
                <hr>
            </div>

            <div class="col-12  ">
                <form name="primeiro_acesso" method="post" action="../php/salvar_cadastro">
                    <div class="form-group">
                        <label class="text-light">Seu Nome completo</label>
                        <input type="text" class="form-control" name="nome" placeholder="Seu Nome" required>
                    </div>
                    <div class="form-group">
                        <label class="text-light">CPF</label>
                        <input type="text" class="form-control" name="cpf" placeholder="CPF" required>
                    </div>
                    <div class="form-group">
                        <label class="text-light">Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="form-group">
                        <label class="text-light">Data de nascimento</label>
                        <input type="date" class="form-control" name="data_nasc" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Genero" id="exampleRadios1" value="M" checked>
                        <label class="form-check-label text-light" for="exampleRadios1">
                            Meu genero é Masculino
                        </label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="Genero" id="exampleRadios1" value="F">
                        <label class="form-check-label text-light" for="exampleRadios1">
                            Meu genero é Feminino
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="text-light">Endereço de email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Seu email" required>
                        <small id="emailHelp" class="form-text  text-light">Nunca vamos compartilhar seu email, com ninguém.</small>
                    </div>
                    <div class="form-group">
                        <label class="text-light" for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    </div>
                    <input type="hidden" value="1" name="nivel">
                    <input type="submit" value="Entrar" name="entrar">
                </form>
            </div>
        </div>


        <div class="col-12 text-center my-5">
            <hr>
            <footer class="footer modal-footer">

                <p>Ciência da Computação</p><br />
                <p>In Solitude Where we are Least le Alone</p>
                <p>Copyright by Wendel Moura - 2020</p>
            </footer>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>
</body>

</html>