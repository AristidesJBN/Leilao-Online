<?php 
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $dt_nascimento = $_POST["dt_nascimento"];
            $nr_telefone = $_POST["nr_telefone"];
            $cpf = $_POST["cpf"];

            $perfil_acesso = 1;
            $dt_criacao = date('Y-m-d H:i:s');
            $ativo = 'S';

            $sql = "INSERT INTO usuario (nm_usuario, email, senha, dt_nascimento, dt_criacao, nr_telefone, cpf, perfil_acesso, ativo) VALUES (
                '{$nome}', '{$email}', '{$senha}', '{$dt_nascimento}', '{$dt_criacao}', '{$nr_telefone}', '{$cpf}', '{$perfil_acesso}', '{$ativo}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com sucesso!')</script>";
                print "<script>location.href='./';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar')</script>";
                print "<script>location.href='./';</script>";
            }

            break;

        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $dt_nascimento = $_POST["dt_nascimento"];

            $sql = "UPDATE usuario SET nm_usuario = '{$nome}',
                                        email = '{$email}',
                                        senha = '{$senha}',
                                        dt_nascimento = '{$dt_nascimento}'
                                        WHERE 
                                        idusuario=".$_REQUEST["idusuario"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso!')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível editar')</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM usuario WHERE idusuario=".$_REQUEST["idusuario"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluido com sucesso!')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível excluir')</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

    }
?>