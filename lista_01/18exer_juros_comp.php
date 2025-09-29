<?php
$pag_atual = 18;
require_once 'cabecalho.php';
?>
<h1>Exercicio 18 - Juros compostos</h1>
<form method="post">
    <div class="mb-3">
        <label for="" class="form-label">Capital (R$)</label>
        <input type="number" id="capital" name="capital" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Taxa de Juros (ex: 0.05 para 5%)</label>
        <input type="number" step=0.01 id="taxa" name="taxa" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="periodo" class="form-label">Período</label>
        <input type="number" id="periodo" name="periodo" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Calcular montante</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $capital = $_POST['capital'];
    $taxa = $_POST['taxa'];
    $periodo = $_POST['periodo'];
    $montante = $capital * (1 + $taxa) ** $periodo;
    echo "<div class='alert alert-success mt-3'>O montante é: <strong>R$ ".number_format($montante, 2, ',', '.')."</strong></div>";
}

require_once 'rodape.php';
?>