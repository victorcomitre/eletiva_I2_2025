<?php
    include("cabecalho.php");
    echo "<h2> Estrutura 4 - while </h2>";
    $i = 1;
    while ($i <= 5){
        echo "<p> numero $i</p>";
        $i++;
    }
    include("rodape.php");
?>