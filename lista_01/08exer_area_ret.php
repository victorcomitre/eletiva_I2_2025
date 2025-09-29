<?php
$pag_atual = 8;
require_once 'cabecalho.php';
?>
<h1>Exercício 8 - Área do retângulo</h1>
<form method="post">
    <div class="mb-3">
        <label for="largura" class="form-label">Largura</label>
        <input type="number" class="form-control" id="largura" name="largura" required>
    </div>
    <div class="mb-3">
        <label for="altura" class="form-label">Altura</label>
        <input type="number" class="form-control" id="altura" name="altura" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Área</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $area = $largura * $altura;
    echo "<div class='alert alert-success mt-3'>A área de um retângulo com largura <strong>$largura</strong> e altura <strong>$altura</strong> é: <strong>$area</strong></div>";
}
require_once 'rodape.php';
?>