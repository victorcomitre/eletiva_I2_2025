<?php
$pag_atual = 4;
require_once 'cabecalho.php';
?>
<h1>Exercício 4 - Divisão</h1>
<form method="post">
    <div class="mb-3">
        <label for="num1" class="form-label">Dividendo</label>
        <input type="number" class="form-control" id="num1" name="num1" required>
    </div>
    <div class="mb-3">
        <label for="num2" class="form-label">Divisor</label>
        <input type="number" class="form-control" id="num2" name="num2" required>
    </div>
    <button type="submit" class="btn btn-primary">Dividir</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    if ($num2 == 0) {
        echo "<div class='alert alert-danger mt-3'>Erro: Divisão por zero não é permitida.</div>";
    } else {
        $resultado = $num1 / $num2;
        echo "<div class='alert alert-success mt-3'><strong>$num1</strong> ÷ <strong>$num2</strong> = <strong>".number_format($resultado, 2, ',', '.')."</strong></div>";
    }
}
require_once 'rodape.php';
?>