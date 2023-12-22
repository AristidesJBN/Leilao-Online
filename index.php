<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Leilão Online</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="?page=login" method="POST" style="width: 23rem;">
          <input type="hidden" name="acaolog" value="logar">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>          


            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example18">Email</label>
              <input name="email" type="email" id="form2Example18" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example28">Senha</label>
              <input name="senha" type="password" id="form2Example28" class="form-control form-control-lg" />
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Esqueci a senha</a></p>
            <p>Não possui conta? <a href="novo-usuario.php" class="link-info">Registre-se agora</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="ogrito.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>


<div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php

                $login = 0;

                include("config.php");
                switch (@$_REQUEST["page"]) {
                    case "novo":
                        include("novo-usuario.php");
                        break;

                    case "login":
                        include("login-usuario.php");
                        break;

                    default:  
                }
                ?>
            </div>
        </div>
    </div>


</body>
<script src="../js/bootstrap.bundle.min.js"></script>
</html>