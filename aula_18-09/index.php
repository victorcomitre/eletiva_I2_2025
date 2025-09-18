<?php
    $valor = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    echo "<p>Primeiro valor do vetor: ".$valor[0]."</p>";
    
    $vetor = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    var_dump($vetor);
    echo "<p></p>";
    print_r($vetor);
    $vetor[4] = 6;
    echo "<p>Novo valor da posição 4: ".$vetor[4]."</p>";

    $vetor['nome'] = "Victor";
    print_r($vetor);

    $valores = [
        'nome' => "Victor",
        'sobrenome' => "Hugo",
        'idade' => 25
    ];

    print_r($valores);
    foreach($valores as $c => $v){
        echo"<p>Posição: $c = Valor: $v</p>";
    }