<?php
$pag_atual = 7;
require_once 'cabecalho.php';
?>
<h1>Exercício 7 - Fahrenheit para Celsius</h1>
<form method="post">
    <div class="mb-3">
        <label for="fahrenheit" class="form-label">Temperatura em Fahrenheit (°F)</label>
        <input type="number" step="0.1" class="form-control" id="fahrenheit" name="fahrenheit" required>
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fahrenheit = $_POST['fahrenheit'];
    $celsius = ($fahrenheit - 32) * 5/9;
    echo "<div class='alert alert-success mt-3'><strong>$fahrenheit °F</strong> equivale a <strong>".number_format($celsius, 2, ',', '.') . " °C</strong>.</div>";
}
require_once 'rodape.php';
?>