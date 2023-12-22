<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <h1>Novo Usuário</h1>

                <br>

                <form action="?page=salvar" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="acao" value="cadastrar">

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <input type="date" name="dt_nascimento" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Telefone (com DDI e DDD)</label>
                        <input type="text" name="nr_telefone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>

            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="ogrito.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var nome = document.forms[0]["nome"].value;
            var email = document.forms[0]["email"].value;
            var senha = document.forms[0]["senha"].value;
            var cpf = document.forms[0]["cpf"].value;
            var dt_nascimento = document.forms[0]["dt_nascimento"].value;
            var nr_telefone = document.forms[0]["nr_telefone"].value;

            if (nome === "" || email === "" || senha === "" || cpf === "" || dt_nascimento === "" || nr_telefone === "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }

            return true;
        }
    </script>

</section>


<?php
                include("config.php");
                switch (@$_REQUEST["page"]) {

                    case "salvar":
                        include("salvar-usuario.php");
                        break;
                    }
?>

</body>

<script src="../js/bootstrap.bundle.min.js"></script>

</html>