<?php
$pag_atual = 2;
require_once 'cabecalho.php';
?>

<h1>Exercício 2 - Triplo da soma</h1>
<p>Escreva um programa para calcular a soma dos dois valores de entrada. Se os dois valores forem iguais, 
    retorne o triplo da soma.</p>
<form method="post">
    <div class="mb-3">
        <label for="valor1" class="form-label">Valor 1</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor2" class="form-label">Valor 2</label>
        <input type="number" id="valor2" name="valor2" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    $resultado = $soma;

    if ($valor1 == $valor2) {
        $resultado = $soma * 3;
    }

    echo "<div class='alert alert-success mt-3'>Resultado: <strong>$resultado</strong></div>";
}
require_once 'rodape.php';
?>