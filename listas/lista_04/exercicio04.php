<?php
$pag_atual = 4;
require_once 'cabecalho.php';
?>

<h1>Impostos dos itens</h1>
<p>Crie um formulário que leia dados de 5 itens: nome e preço. Leia os dados e crie um mapa ordenado onde as 
    chaves são os nomes dos itens e os valores são os preços após aplicação de um imposto de 15%. Exiba a lista 
    ordenada pelos preços após a aplicação do imposto.</p>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h5>Item <?= $i ?></h5>
        <div class="row mb-3">
            <div class="col"><input type="text" name="nomes[]" class="form-control" placeholder="Nome do item" required></div>
            <div class="col"><input type="number" step="0.01" name="precos[]" class="form-control" placeholder="Preço" required></div>
        </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $precos = $_POST['precos'];
    $itens = [];

    // mapa de itens + imposto
    for ($i = 0; $i < count($nomes); $i++) {
        $preco_final = $precos[$i] * 1.15;
        $itens[$nomes[$i]] = $preco_final;
    }

    // ordena o mapa pelo valor (preço final)
    asort($itens);

    echo "<div class='alert alert-success mt-3'>";
    echo "<h3>Itens ordenados por preço (+15%)</h3>";
    foreach ($itens as $nome => $preco) {
        echo "<p><strong>Item:</strong> $nome - <strong>Preço com Imposto:</strong> R$ ".number_format($preco, 2, ',', '.') . "</p>";
    }
    echo "</div>";
}
require_once 'rodape.php';
?>