<?php
$pag_atual = 13;
require_once 'cabecalho.php';
?>
<h1>Exercício 13 - Metros para centímetros</h1>
<form method="post">
    <div class="mb-3">
        <label for="metros" class="form-label">Valor em Metros (m)</label>
        <input type="number" class="form-control" id="metros" name="metros" required>
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $metros = $_POST['metros'];
    $centimetros = $metros * 100;
    echo "<div class='alert alert-success mt-3'><strong>$metros m</strong> equivale a <strong>$centimetros cm</strong>.</div>";
}
require_once 'rodape.php';
?>