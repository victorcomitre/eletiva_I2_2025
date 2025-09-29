<?php
$pag_atual= 3;
require_once 'cabecalho.php';
?>
<h1>Exercício 3 - Multiplicação</h1>
<form method="post">
    <div class="mb-3">
        <label for="num1" class="form-label">Número 1</label>
        <input type="number" class="form-control" id="num1" name="num1" required>
    </div>
    <div class="mb-3">
        <label for="num2" class="form-label">Número 2</label>
        <input type="number" class="form-control" id="num2" name="num2" required>
    </div>
    <button type="submit" class="btn btn-primary">Multiplicar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $resultado = $num1 * $num2;
    echo "<div class='alert alert-success mt-3'><strong>$num1</strong> x <strong>$num2</strong> = <strong>$resultado</strong></div>";
}
require_once 'rodape.php';
?>