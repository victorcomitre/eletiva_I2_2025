</main>
<footer class="container py-3">
  <hr class="mt-5">
  <div class="d-flex justify-content-between">
    <div>
      <?php

      $exercicios = [
        1  => '01exer_soma.php',
        2  => '02exer_sub.php',
        3  => '03exer_multi.php',
        4  => '04exer_dividir.php',
        5  => '05exer_media.php',
        6  => '06exer_C-F.php',
        7  => '07exer_F-C.php',
        8  => '08exer_area_ret.php',
        9  => '09exer_area_circ.php',
        10 => '10exer_perim_ret.php',
        11 => '11exer_perim_circ.php',
        12 => '12exer_pot.php',
        13 => '13exer_m-cm.php',
        14 => '14exer_km-mi.php',
        15 => '15exer_imc.php',
        16 => '16exer_desconto_perc.php',
        17 => '17exer_juros_simples.php',
        18 => '18exer_juros_comp.php',
        19 => '19exer_dia-hms.php',
        20 => '20exer_velo_media.php'
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