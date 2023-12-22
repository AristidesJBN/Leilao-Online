<?php 
session_start();
var_dump($_SESSION);


switch ($_REQUEST["acaolog"]) {
    case 'logar':
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $sql = "SELECT idusuario, email, senha FROM usuario WHERE email ='" . $email . "'";
        $res = $conn->query($sql);

        if ($res === false) {
            die('Erro na consulta: ' . $conn->error);
        }

        $qtd = $res->num_rows;

        if ($qtd == 0) {
            print "<script>alert('Usuário não encontrado');</script>";
        } else {
            $usuario = $res->fetch_assoc(); // Extrai o resultado da consulta
            $senhaBanco = $usuario['senha'];

            if ($senha = $senhaBanco) {
                $_SESSION['idusuario'] = intval($usuario['idusuario']);
                $_SESSION['email'] = $usuario['email'];
            
                header("Location: ./on/");
            } else{
                print "<script>alert('Senha incorreta');</script>";
            }
        }
        break;
}
?>
