<?php
$pag_atual = 12;
require_once 'cabecalho.php';
?>
<h1>Exercício 12 - Potenciação</h1>
<form method="post">
    <div class="mb-3">
        <label for="base" class="form-label">Base</label>
        <input type="number" class="form-control" id="base" name="base" required>
    </div>
    <div class="mb-3">
        <label for="expoente" class="form-label">Expoente</label>
        <input type="number" class="form-control" id="expoente" name="expoente" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $base = $_POST['base'];
    $expoente = $_POST['expoente'];
    $resultado = pow($base, $expoente);
    echo "<div class='alert alert-success mt-3'><strong>$base</strong>^<strong>$expoente</strong> = <strong>".number_format($resultado, 2, ',', '.')."</strong></div>";
}
require_once 'rodape.php';
?>