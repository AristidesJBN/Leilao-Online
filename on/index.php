<?php
include("../config.php");

session_start();
var_dump($_SESSION);
$idUsuario = $_SESSION['idusuario'];

if (!isset($_SESSION['idusuario'])) {
    header("Location: ../");
    exit();
}

$sql = "SELECT * FROM usuario WHERE idusuario = " . $idUsuario . "";
echo $sql;
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();

    $nm_usuario = $row['nm_usuario'];
    $email = $row['email'];
    $dt_nascimento = $row['dt_nascimento'];
    $dt_criacao = $row['dt_criacao'];
    $nr_telefone = $row['nr_telefone'];
    $cpf = $row['cpf'];
    $perfil_acesso = $row['perfil_acesso'];

} else {
    header("Location: ../");
}
ob_end_clean(); //limpa var_dump

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leilão</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar bg-body-tertiary fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand"  href="? page=default">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-book' viewBox='0 0 16 16'>
                        <path d='M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783' />
                    </svg> Leilão Online
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="? page=exposicao">Exposição</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="? page=lances">Meus lances</a>
                        </li>
                        <?php
                        if ($perfil_acesso >= 2) {
                            print "<li class='nav-item'>
                                <a class='nav-link' href='? page=vitrine'>Minha vitrine</a>
                            </li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="margin-right: 10px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Configurações</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Meu perfil</a>
                    </li>
                  <?php
                      if ($perfil_acesso >= 3) {
                          print "<li class='nav-item'>
                              <a class='nav-link active' href='? page=listar'>Administração</a>
                          </li>";
                      }
                      ?>
                      <li class="nav-item">
                      <a class="nav-link" href="../" style="color: red">Sair</a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container"  style="margin-top: 30px;">
        <div class="row">
            <div class="col mt-5">
                <?php
                
                switch (@$_REQUEST["page"]) {
                    case "exposicao":
                        include("exposicao-obra.php");
                        break;

                    case "lances":
                        print "<h1>Página em construção</h1>";
                        break;

                    case "vitrine":
                        print "<h1>Página em construção</h1>";
                        break;

                    case "listar":
                        include("listar-usuarios.php");
                        break;

                    case "salvar":
                        include("../salvar-usuario.php");
                        break;

                    case "editar":
                        include("editar-usuario.php");
                        break;

                    case "login":
                        include("login-usuario.php");
                        break;

                    default:
                        print "<h1>Olá, ". $nm_usuario ."!</h1>";
                        
                }
                ?>
            </div>
        </div>
    </div>

</body>
<script src="../js/bootstrap.bundle.min.js"></script>

</html>
