<?php
    $nome = "Victor";
    echo "<p> Todas maiúculo: ".strtoupper($nome)." </p>";
    echo "<p> Todas minúsculo: ".strtolower($nome." </p>");
    echo "<p> Quantidade de caracteres: ".strlen($nome." </p>");
    $caractere = "t";
    $posicao = strpos($nome, $caractere);

    echo "<p> Caractere ".$caractere." na posição: ".$posicao." </p>";

    date_default_timezone_set('America/Sao_Paulo');

    $data1 = date("d/m/Y");
    echo "<p> Data: ".$data1." </p>";
    $data2 = date("d");
    echo "<p> Dia: ".$data2." </p>";
    $data3 = date("m");
    echo "<p> Mes: ".$data3." </p>";
    $data4 = date("Y");
    echo "<p> Ano: ".$data4." </p>";

    $hora = date("H:i:s");
    echo "<p> Hora: ".$hora." </p>";

    $valor = -10.9;
    echo "<p> Valor formatado: ".number_format($valor,2,",",".")." </p>";
    echo "<p> Valor absoluto: ".abs($valor)." </p>";
    echo "<p> Valor arredondado: ".round($valor)." </p>";
    $valor = rand(1,6);
    echo "<p> Valor aleatório: ".$valor." </p>";
    $valor = 225;
    echo "<p> Raiz quadrada de: ".$valor." é ".sqrt($valor)." </p>";



?>