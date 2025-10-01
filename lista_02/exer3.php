<?php
$pag_atual = 3;
require_once 'cabecalho.php';
?>

<h1>Exercício 3 - Ordem crescente</h1>
<p>Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos seus valores. 
    Caso os valores sejam iguais, informar o usuário e imprimir o valor em tela apenas uma vez.</p>
<form method="post">
    <div class="mb-3">
        <label for="valorA" class="form-label">Valor A</label>
        <input type="number" id="valorA" name="valorA" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="valorB" class="form-label">Valor B</label>
        <input type="number" id="valorB" name="valorB" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Verificar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valora = $_POST['valorA'];
    $valorb = $_POST['valorB'];
    $resultado = "";

    if ($valora == $valorb) {
        $resultado = "Números iguais: $a";
    } elseif ($valora < $valorb) {
        $resultado = "$valora $valorb";
    } else {
        $resultado = "$valorb $valora";
    }

    echo "<div class='alert alert-success mt-3'>$resultado</div>";
}
require_once 'rodape.php';
?>