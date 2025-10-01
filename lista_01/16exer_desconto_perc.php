<?php
$pag_atual = 16;
require_once 'cabecalho.php';
?>
<h1>Exercício 16 - Preço com desconto</h1>
<p>Crie um formulário que permita ao usuário inserir um preço e um percentual de desconto. O
script PHP deve calcular o preço com desconto e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="preco" class="form-label">Preço Original (R$)</label>
        <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
    </div>
    <div class="mb-3">
        <label for="desconto" class="form-label">Desconto (%)</label>
        <input type="number" class="form-control" id="desconto" name="desconto" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preco = $_POST['preco'];
    $desconto = $_POST['desconto'];
    $valor_desconto = $preco * ($desconto / 100);
    $preco_final = $preco - $valor_desconto;
    echo "<div class='alert alert-success mt-3'>O preço final com <strong>$desconto%</strong> de desconto é: <strong>R$ ".number_format($preco_final, 2, ',', '.')."</strong></div>";
}
require_once 'rodape.php';
?>