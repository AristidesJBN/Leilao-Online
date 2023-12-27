<br>

<?php

$sql = "SELECT * FROM obra";


$res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0){

        print "<div class='exposicoes'>";
        while($row = $res->fetch_object()){

            print "<div class='product-container'>";
            print "<img class='product-image' src='img-obra/".$row->dir_foto."' alt='".$row->nm_obra."'>";
            print "<div class='product-title'>" .$row->nm_obra."</div>";
            print "<div class='product-title'>" .$row->nm_autor."</div>";
            print "<div class='product-price'>R$ ".$row->valor_inicial."</div>";
            print "<a href='#' class='buy-button'>Dar lance</a>";
            print "</div>";
        }
        print "</div>";

    }else{
        print "<p class='alert alert-danger'>Não existe registro de usuários no momento</p>";
    }

?>