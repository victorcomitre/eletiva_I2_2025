<?php
$pag_atual = 1;
require_once 'cabecalho.php';
?>

<h1>Exercício 1 - Menor valor</h1>
<p>Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima a posição do menor valor 
    na sequência de entrada.</p>
<form method="post">
    <div class="mb-3">
        <label for="valor1" class="form-label">Informe o valor 1</label>
        <input type="text" id="valor1" name="valor1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor2" class="form-label">Informe o valor 2</label>
        <input type="text" id="valor2" name="valor2" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor3" class="form-label">Informe o valor 3</label>
        <input type="text" id="valor3" name="valor3" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor4" class="form-label">Informe o valor 4</label>
        <input type="text" id="valor4" name="valor4" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor5" class="form-label">Informe o valor 5</label>
        <input type="text" id="valor5" name="valor5" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor6" class="form-label">Informe o valor 6</label>
        <input type="text" id="valor6" name="valor6" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valor7" class="form-label">Informe o valor 7</label>
        <input type="text" id="valor7" name="valor7" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $valor3 = $_POST['valor3'];
    $valor4 = $_POST['valor4'];
    $valor5 = $_POST['valor5'];
    $valor6 = $_POST['valor6'];
    $valor7 = $_POST['valor7'];

    $menor = $valor1;
    $posicao = 1;

    if ($valor2 < $menor) {
        $menor = $valor2;
        $posicao = 2;
    }
    if ($valor3 < $menor) {
        $menor = $valor3;
        $posicao = 3;
    }
    if ($valor4 < $menor) {
        $menor = $valor4;
        $posicao = 4;
    }
    if ($valor5 < $menor) {
        $menor = $valor5;
        $posicao = 5;
    }
    if ($valor6 < $menor) {
        $menor = $valor6;
        $posicao = 6;
    }
    if ($valor7 < $menor) {
        $menor = $valor7;
        $posicao = 7;
    }

    echo "<div class='alert alert-success mt-3'>O menor valor é: <strong>$menor</strong> e está na posição <strong>$posicao</strong></div>";
}
require_once 'rodape.php';
?>