<?php
$pag_atual = 5;
require_once 'cabecalho.php';
?>

<h1>Exercício 5 - Raiz quadrada</h1>
<p>Crie um programa em PHP que leia um valor e retorna a raiz quadrada desse número.</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Digite um número</label>
        <input type="number" step="any" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
function calcularRaiz($numero) {
    // função interna sqrt()
    return sqrt($numero);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $raiz = calcularRaiz($numero);
    echo "<div class='alert alert-success mt-3'><p>A raiz quadrada de <strong>$numero</strong> é <strong>$raiz</strong>.</p></div>";
}
require_once 'rodape.php';
?>