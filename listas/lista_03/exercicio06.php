<?php
$pag_atual = 6;
require_once 'cabecalho.php';
?>

<h1>Exercício 6 - Arredondar número</h1>
<p>Crie um programa em PHP que recebe um número de ponto flutuante e retorna o número arredondado.</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Digite um número com casas decimais</label>
        <input type="number" step="any" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Arredondar</button>
</form>

<?php
function arredondarNumero($numero) {
    // função interna round()
    return round($numero);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $arredondado = arredondarNumero($numero);
    echo "<div class='alert alert-success mt-3'><p>O número <strong>$numero</strong> arredondado é <strong>$arredondado</strong>.</p></div>";
}
require_once 'rodape.php';
?>