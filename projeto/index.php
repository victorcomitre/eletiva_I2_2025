<?php 
$titulo_pag = 'ARTControl';
include 'cabecalho.php'; 
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

<?php include 'rodape.php'; ?>