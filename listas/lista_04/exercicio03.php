<?php
$pag_atual = 3;
require_once 'cabecalho.php';
?>

<h1>Produtos</h1>
<p>Crie um formulário que leia dados de 5 produtos, que são: código, nome e preço. Leia os dados e crie um mapa 
    ordenado onde as chaves são os códigos dos produtos e os valores são também mapas ordenados com o nome e o preço dos 
    produtos. Aplique um desconto de 10% em todos os produtos com preço acima de R$100,00 e exiba a lista ordenada pelo 
    nome do produto.</p>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h5>Produto <?= $i ?></h5>
        <div class="row mb-3">
            <div class="col"><input type="text" name="codigos[]" class="form-control" placeholder="Código" required></div>
            <div class="col"><input type="text" name="nomes[]" class="form-control" placeholder="Nome do produto" required></div>
            <div class="col"><input type="number" step="0.01" name="precos[]" class="form-control" placeholder="Preço" required></div>
        </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Processar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigos = $_POST['codigos'];
    $nomes = $_POST['nomes'];
    $precos = $_POST['precos'];
    $produtos = [];

    // mapa de produtos + desconto
    for ($i = 0; $i < count($codigos); $i++) {
        $preco = $precos[$i];
        if ($preco > 100) {
            $preco *= 0.90;
        }
        $produtos[$codigos[$i]] = ['nome' => $nomes[$i], 'preco' => $preco];
    }

    // ordena o mapa usando uma função customizada para comparar pelo 'nome' do produto
    uasort($produtos, function($a, $b) {
        return $a['nome'] <=> $b['nome'];
    });

    echo "<div class='alert alert-success mt-3'>";
    echo "<h3>Lista de Produtos</h3>";
    foreach ($produtos as $codigo => $dados) {
        echo "<p><strong>Cód:</strong> $codigo - <strong>Nome:</strong> {$dados['nome']} - <strong>Preço Final:</strong> R$ " . number_format($dados['preco'], 2, ',', '.') . "</p>";
    }
    echo "</div>";
}
require_once 'rodape.php';
?>