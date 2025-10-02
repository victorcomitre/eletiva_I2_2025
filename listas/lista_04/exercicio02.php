<?php
$pag_atual = 2;
require_once 'cabecalho.php';
?>

<h1>Médias dos alunos</h1>
<p>Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os dados e crie um mapa ordenado 
    onde as chaves são os nomes dos alunos e os valores são as médias das notas. Exiba a lista de alunos ordenada 
    pela média das notas (do maior para o menor).</p>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h5>Aluno <?= $i ?></h5>
        <div class="row mb-3">
            <div class="col-md-6"><input type="text" name="nomes[]" class="form-control" placeholder="Nome do aluno" required></div>
            <div class="col-md-2"><input type="number" step="0.1" name="notas1[]" class="form-control" placeholder="Nota 1" required></div>
            <div class="col-md-2"><input type="number" step="0.1" name="notas2[]" class="form-control" placeholder="Nota 2" required></div>
            <div class="col-md-2"><input type="number" step="0.1" name="notas3[]" class="form-control" placeholder="Nota 3" required></div>
        </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $notas1 = $_POST['notas1'];
    $notas2 = $_POST['notas2'];
    $notas3 = $_POST['notas3'];
    $alunos = [];

    // mapa de alunos com suas médias
    for ($i = 0; $i < count($nomes); $i++) {
        $media = ($notas1[$i] + $notas2[$i] + $notas3[$i]) / 3;
        $alunos[$nomes[$i]] = $media;
    }

    // ordena o mapa pelo valor (média)
    arsort($alunos);

    echo "<div class='alert alert-success mt-3'>";
    echo "<h3>Ranking de alunos por média</h3>";
    foreach ($alunos as $nome => $media) {
        echo "<p><strong>Nome:</strong> $nome - <strong>Média:</strong> ".number_format($media, 2)."</p>";
    }
    echo "</div>";
}
require_once 'rodape.php';
?>