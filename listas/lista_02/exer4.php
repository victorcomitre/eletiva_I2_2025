<?php
$pag_atual = 4;
require_once 'cabecalho.php';
?>

<h1>Exercício 4 - Desconto de produto</h1>
<p>Faça um programa em PHP onde o valor de um produto é informado. Se esse valor for superior a R$100,00 deve ser 
    aplicado um desconto de 15% sobre ele e exibido o novo valor do produto.</p>
<form method="post">
    <div class="mb-3">
        <label for="preco" class="form-label">Preço do Produto (R$)</label>
        <input type="number" step="0.01" id="preco" name="preco" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preco = $_POST['preco'];
    $preco_final = $preco;
    $mensagem = "O valor final do produto é <strong>R$ ".number_format($preco_final, 2, ',', '.')."</strong>";

    if ($preco > 100) {
        $preco_final = $preco * 0.85;
        $mensagem = "O produto recebeu 15% de desconto. Novo valor: <strong>R$ ".number_format($preco_final, 2, ',', '.')."</strong>";
    }

    echo "<div class='alert alert-success mt-3'>$mensagem</div>";
}
require_once 'rodape.php';
?>