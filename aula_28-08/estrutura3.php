<?php
    include("cabecalho.php");
    echo "<h2> Estrutura 3 </h2>";
    $diaSemana = 3;
    switch($diaSemana){
        case 1:
            echo "Hoje é domingo!";
            break;
        case 2:
            echo "Hoje é segunda!";
            break;
        case 3:
            echo "Hoje terça!";
            break;
        default:
            echo "Hoje pode ser qualquer dia (quarta, quinta, sexta ou sábado)";
    }
    include("rodape.php");
?>