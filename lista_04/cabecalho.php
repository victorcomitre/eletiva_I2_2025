<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lista 04</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="exercicio01.php">Lista 04</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarLinks">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          $exercicios = [
                1 => 'exercicio01.php',
                2 => 'exercicio02.php',
                3 => 'exercicio03.php',
                4 => 'exercicio04.php',
                5 => 'exercicio05.php'
            ];
          foreach ($exercicios as $indice => $nome_arquivo) {
            $ativo = (isset($pag_atual) && $pag_atual == $indice) ? 'active' : '';
            echo "<li class='nav-item'><a class='nav-link {$ativo}' href='{$nome_arquivo}'>Exercício {$indice}</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container py-5 flex-grow-1">
