<?php
$pag_atual = 5;
require_once 'cabecalho.php';
?>
<h1>Exercício 5 - Média de notas</h1>
<form method="post">
    <div class="mb-3">
        <label for="nota1" class="form-label">Nota 1</label>
        <input type="number" step="0.1" class="form-control" id="nota1" name="nota1" required>
    </div>
    <div class="mb-3">
        <label for="nota2" class="form-label">Nota 2</label>
        <input type="number" step="0.1" class="form-control" id="nota2" name="nota2" required>
    </div>
    <div class="mb-3">
        <label for="nota3" class="form-label">Nota 3</label>
        <input type="number" step="0.1" class="form-control" id="nota3" name="nota3" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Média</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $media = ($nota1 + $nota2 + $nota3) / 3;
    echo "<div class='alert alert-success mt-3'>A média das notas é: <strong>".number_format($media, 2, ',', '.')."</strong></div>";
}
require_once 'rodape.php';
?>