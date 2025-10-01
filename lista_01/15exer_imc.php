<?php
$pag_atual = 15;
require_once 'cabecalho.php';
?>
<h1>Exercício 15 - Cálculo de IMC</h1>
<p>Crie um formulário que permita ao usuário inserir seu peso (em kg) e altura (em metros). O
script PHP deve calcular o IMC (peso / altura²) e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="peso" class="form-label">Peso (kg)</label>
        <input type="number" step="0.1" class="form-control" id="peso" name="peso" required>
    </div>
    <div class="mb-3">
        <label for="altura" class="form-label">Altura (m)</label>
        <input type="number" step="0.01" class="form-control" id="altura" name="altura" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular IMC</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $peso / ($altura * $altura);
    echo "<div class='alert alert-success mt-3'>Seu IMC é: <strong>".number_format($imc, 2, ',', '.')."</strong></div>";
}
require_once 'rodape.php';
?>