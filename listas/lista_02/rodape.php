</main>
<footer class="container py-3">
  <hr class="mt-5">
  <div class="d-flex justify-content-between">
    <div>
      <?php

      $exercicios = [
        1  => 'exer1.php',
        2  => 'exer2.php',
        3  => 'exer3.php',
        4  => 'exer4.php',
        5  => 'exer5.php',
        6  => 'exer6.php',
        7  => 'exer7.php',
        8  => 'exer8.php',
        9  => 'exer9.php',
        10 => 'exer10.php'
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
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>