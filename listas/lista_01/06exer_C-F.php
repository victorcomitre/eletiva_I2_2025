<?php
$pag_atual = 6;
require_once 'cabecalho.php';
?>
<h1>Exercício 6 - Celsius para Fahrenheit</h1>
<p>Crie um formulário que permita ao usuário inserir uma temperatura em Celsius. O script PHP
deve converter essa temperatura para Fahrenheit e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="celsius" class="form-label">Temperatura em Celsius (°C)</label>
        <input type="number" step="0.1" class="form-control" id="celsius" name="celsius" required>
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $celsius = $_POST['celsius'];
    $fahrenheit = ($celsius * 9/5) + 32;
    echo "<div class='alert alert-success mt-3'><strong>$celsius °C</strong> equivale a <strong>".number_format($fahrenheit, 2, ',', '.') . " °F</strong>.</div>";
}
require_once 'rodape.php';
?>