<?php
$pag_atual = 17;
require_once 'cabecalho.php';
?>
<h1>Exercício 17 - Juros simples</h1>
<form method="post">
    <div class="mb-3">
        <label for="capital" class="form-label">Capital (R$)</label>
        <input type="number" step="0.01" class="form-control" id="capital" name="capital" required>
    </div>
    <div class="mb-3">
        <label for="taxa" class="form-label">Taxa de Juros (ex: 0.05 para 5%)</label>
        <input type="number" step="0.01" class="form-control" id="taxa" name="taxa" required>
    </div>
    <div class="mb-3">
        <label for="periodo" class="form-label">Período</label>
        <input type="number" class="form-control" id="periodo" name="periodo" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Juros</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $capital = $_POST['capital'];
    $taxa = $_POST['taxa'];
    $periodo = $_POST['periodo'];
    $juros = $capital * $taxa * $periodo;
    echo "<div class='alert alert-success mt-3'>O valor dos juros simples é: <strong>R$ " . number_format($juros, 2, ',', '.') . "</strong></div>";
}
require_once 'rodape.php';
?>