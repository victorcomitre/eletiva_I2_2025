<?php
require_once 'conexao.php';
$titulo_pag = 'ARTControl';
include 'cabecalho.php';

// Busca 5 artistas com mais obras cadastradas
try {
    $sql_grafico = "SELECT a.nome, COUNT(o.id) as total 
                    FROM artista a 
                    LEFT JOIN obra o ON a.id = o.artista_id 
                    GROUP BY a.id 
                    ORDER BY total DESC 
                    LIMIT 5";
    $stmt = $pdo->query($sql_grafico);
    $dados_grafico = $stmt->fetchAll();

    // Preparativo das arrays
    $nomes = [];
    $totais = [];
    foreach ($dados_grafico as $d) {
        $nomes[] = $d['nome'];
        $totais[] = $d['total'];
    }

    // Transforma em JSON
    $json_nomes = json_encode($nomes);
    $json_totais = json_encode($totais);
} catch (Exception $e) {
    $json_nomes = "[]";
    $json_totais = "[]";
}
?>

<div class="row text-center">
    <div class="col-md-12 mb-4">
        <h1 class="display-5">Bem-vindo(a) ao acervo!</h1>
        <p class="lead text-muted">Gerencie artistas, obras e curadoria de exposições.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <h3>Artistas</h3>
            <p>Gerencie os criadores.</p>
            <a href="lista_artistas.php" class="btn btn-outline-dark">Acessar
                <i class="bi bi-chevron-double-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <h3>Obras</h3>
            <p>Catálogo de pinturas e esculturas.</p>
            <a href="lista_obras.php" class="btn btn-outline-dark">Acessar
                <i class="bi bi-chevron-double-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <h3>Exposições</h3>
            <p>Planejamento e curadoria.</p>
            <a href="lista_exposicoes.php" class="btn btn-outline-dark">Acessar
                <i class="bi bi-chevron-double-right"></i>
            </a>
        </div>
    </div>
</div>

<div>
    <hr class="my-4 d-print-none">
    <div class="row justify-content-center mb-5 d-print-none">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm">
                <h4 class="card-title text-center mb-4">
                    <i class="bi bi-bar-chart-line"></i> Maiores artistas por número de obras
                </h4>
                <canvas id="grafico"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('grafico');

        // dados do PHP
        const nomes = <?= $json_nomes ?>;
        const totais = <?= $json_totais ?>;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nomes,
                datasets: [{
                    label: 'Obras',
                    data: totais,
                    backgroundColor: 'rgba(52, 58, 64, 0.7)',
                    borderColor: 'rgba(52, 58, 64, 0)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</div>

<?php include 'rodape.php'; ?>