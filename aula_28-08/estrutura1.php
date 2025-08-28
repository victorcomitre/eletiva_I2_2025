<?php
    include("cabecalho.php");
    echo "<h2> Estrutura 1</h2>";
    $valor = 10;
    if ($valor > 10)  {
        echo "valor maior 10";
    } 
    elseif ($valor < 10){
        echo "valor menor que 10";

    }
    else {
        echo "valor menor que 10";
    }
    include("rodape.php");
?>