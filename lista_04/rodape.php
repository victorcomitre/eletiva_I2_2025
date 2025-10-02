</main>
<footer class="container py-3">
    <hr>
    <div class="d-flex justify-content-between">
        <div>
            <?php
            $exercicios = [
                1 => 'exercicio01.php',
                2 => 'exercicio02.php',
                3 => 'exercicio03.php',
                4 => 'exercicio04.php',
                5 => 'exercicio05.php'
            ];
            
            if (isset($pag_atual) && $pag_atual > 1) {
                $pag_anterior = $pag_atual - 1;
                $nome_pag_anterior = $exercicios[$pag_anterior];
                echo "<a href='{$nome_pag_anterior}' class='btn btn-secondary'>&larr; Anterior</a>";
            }
            ?>
        </div>
        <div>
            
            <?php
            if (isset($pag_atual) && $pag_atual < count($exercicios)) {
                $pag_seguinte = $pag_atual + 1;
                $nome_pag_seguinte = $exercicios[$pag_seguinte];
                echo "<a href='{$nome_pag_seguinte}' class='btn btn-primary'>Próximo &rarr;</a>";
            }
            ?>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
