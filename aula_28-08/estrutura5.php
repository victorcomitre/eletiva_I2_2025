<?php
    include("cabecalho.php");
    echo "<h2> Estrutura 5 - do-while </h2>";
    $i = 1;
    do{
        echo "<p> número $i </p>";
        $i++;
    } while($i <= 5);

    include("rodape.php");
?>