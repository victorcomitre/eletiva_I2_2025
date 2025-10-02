<?php
$pag_atual = 5;
require_once 'cabecalho.php';
?>

<h1>Estoque de livros</h1>
<p>Crie um formulário que leia dados de 5 livros: título e quantidade em estoque. Leia os dados e crie um 
    mapa ordenado onde as chaves são os títulos dos livros e os valores são a quantidade em estoque. Verifique 
    se a quantidade em estoque é inferior a 5 e exiba um alerta para os livros com baixa quantidade. Exiba a lista 
    ordenada pelo título dos livros.</p>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h5>Livro <?= $i ?></h5>
        <div class="row mb-3">
            <div class="col"><input type="text" name="titulos[]" class="form-control" placeholder="Título do livro" required></div>
            <div class="col"><input type="number" name="quantidades[]" class="form-control" placeholder="Quantidade em estoque" required></div>
        </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Verificar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulos = $_POST['titulos'];
    $quantidades = $_POST['quantidades'];
    $livros = [];

    // mapa de livros
    for ($i = 0; $i < count($titulos); $i++) {
        $livros[$titulos[$i]] = $quantidades[$i];
    }

    // ordena o mapa pela chave (título)
    ksort($livros);

    echo "<div class='alert alert-success mt-3'>";
    echo "<h3>Estoque de livros por título</h3>";
    foreach ($livros as $titulo => $qtd) {
        $alerta = "";
        if ($qtd < 5) {
            $alerta = "<span class='badge bg-danger ms-2'>Estoque Baixo!</span>";
        }
        echo "<p><strong>Título:</strong> $titulo - <strong>Estoque:</strong> $qtd $alerta</p>";
    }
    echo "</div>";
}
require_once 'rodape.php';
?>