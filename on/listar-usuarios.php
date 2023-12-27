<h1>Cadastro de usuários</h1>
<br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezCZ/Rz0TZHQlmLCO8Rr7qT+IAqAxFn4Dm/EePPnpd2WrG8JvG70OKZKZfwwQPyC" crossorigin="anonymous">

<?php 
    $sql = "SELECT idusuario, nm_usuario, nr_telefone, email, dt_nascimento, perfil_acesso, ativo FROM usuario";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0){
        print "<table class='table' style='text-align: center'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>Telefone</th>";
            print "<th>E-mail</th>";
            print "<th>Data de nascimento</th>";
            print "<th>Perfil de acesso</th>";
            print "<th>Situação</th>";
            print "<th>Ações</th>";
        print "</tr>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idusuario."</td>";
            print "<td>".$row->nm_usuario."</td>";

            $telefone_banco = $row->nr_telefone;
            $formata_telefone = formatarNumero($telefone_banco);
            print "<td>".$formata_telefone."</td>";


            print "<td>".$row->email."</td>";

            $data_banco =  $row->dt_nascimento;
            $formata_data = date("d/m/Y", strtotime($data_banco));
            print "<td>".$formata_data."</td>";

                switch ($row->perfil_acesso){
                    case 1:
                        print "<td>Comprador</td>";
                        break;
                    case 2:
                        print "<td>Vendedor</td>";
                        break;
                    case 3:
                        print "<td>Administrador</td>";
                        break;
                    default:
                        print "<td>Indefinido</td>";
                        break;
                }

                switch ($row->ativo){
                    case 1:
                        print "<td>Ativo</td>";
                        break;
                    case 0:
                        print "<td>Inativo</td>";
                        break;
                    default:
                        print "<td>Indefinido</td>";
                        break;
                }
                    

                print "<td>
                <button onclick=\"
                location.href='?page=editar&idusuario=".$row->idusuario."';
                \" class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
                <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
              </svg>
              Editar</button>

                <button onclick=\"
                if(confirm('Tem certeza que deseja excluir?')){
                    location.href='?page=salvar&acao=excluir&idusuario=".$row->idusuario."';
                }else{
                    false;
                }
                \" class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
              </svg>
               Excluir</button>
                </td>";
            print "</tr>";

        }
        print "</table>";

    }else{
        print "<p class='alert alert-danger'>Não existe registro de usuários no momento</p>";
    }
    

    function formatarNumero($numero) {
        if (strlen($numero) == 13) {
            $codigoPais = substr($numero, 0, 2);
            $codigoRegiao = substr($numero, 2, 2);
            $numeroTelefone = substr($numero, 4);
    
            $numeroFormatado = "+$codigoPais $codigoRegiao " . substr_replace($numeroTelefone, '-', 5, 0);
    
            return $numeroFormatado;
        } else {
            return "Número inválido";
        }
    }
?>