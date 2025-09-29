<?php
$pag_atual = 14;
require_once 'cabecalho.php';
?>
<h1>Exercício 14 - Quilômetros para milhas</h1>
<form method="post">
    <div class="mb-3">
        <label for="km" class="form-label">Valor em Quilômetros (km)</label>
        <input type="number" step="0.1" class="form-control" id="km" name="km" required>
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $km = $_POST['km'];
    $milhas = $km * 0.621371;
    echo "<div class='alert alert-success mt-3'><strong>$km km</strong> equivalem a <strong>".number_format($milhas, 2, ',', '.')." milhas</strong>.</div>";
}
require_once 'rodape.php';
?>