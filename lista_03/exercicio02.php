<?php
$pag_atual = 2;
require_once 'cabecalho.php';
?>

<h1>Exercício 2 - Maiúsculo e Minúsculo</h1>
<p>Crie um programa em PHP em que seja lida uma palavra e ela seja apresentada com seus caracteres em maiúsculo e minúsculo.</p>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">Digite uma palavra</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

<?php
function converterCaixa($palavra) {
    // funções internas strtoupper() e strtolower()
    $resultado['maiusculo'] = strtoupper($palavra);
    $resultado['minusculo'] = strtolower($palavra);
    return $resultado;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    $conversoes = converterCaixa($palavra);
    echo "<div class='alert alert-success mt-3'>
    <p><strong>Maiúsculo</strong>: ".$conversoes['maiusculo']."</p>
    <p><strong>Minúsculo</strong>: ".$conversoes['minusculo']."</p>
    </div>";
}
require_once 'rodape.php';
?>