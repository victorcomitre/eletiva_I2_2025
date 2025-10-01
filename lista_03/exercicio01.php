<?php
$pag_atual = 1;
require_once 'cabecalho.php';
?>

<h1>Exercício 1 - Contar caracteres</h1>
<p>Crie um programa em PHP em que seja lida uma palavra e apresentado o número de caracteres dessa palavra.</p>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">Digite uma palavra</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Contar</button>
</form>

<?php

function contarCaracteres($palavra) {
    // função interna strlen()
    return strlen($palavra);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    $quantidade = contarCaracteres($palavra);
    echo "<div class='alert alert-success mt-3'><p>A palavra <strong>'$palavra'</strong> possui <strong>$quantidade</strong> caracteres.</p></div>";
}
require_once 'rodape.php';
?>