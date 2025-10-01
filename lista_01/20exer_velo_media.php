<?php
$pag_atual = 20;
require_once 'cabecalho.php';
?>
<h1>Exercício 20 - Velocidade média</h1>
<p>Crie um formulário que permita ao usuário inserir uma distância e um tempo. O script PHP
deve calcular a velocidade média (distância / tempo) e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="distancia" class="form-label">Distância (km)</label>
        <input type="number" step="0.1" class="form-control" id="distancia" name="distancia" required>
    </div>
    <div class="mb-3">
        <label for="tempo" class="form-label">Tempo (h)</label>
        <input type="number" step="0.1" class="form-control" id="tempo" name="tempo" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Velocidade</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $distancia = $_POST['distancia'];
    $tempo = $_POST['tempo'];
    if ($tempo == 0) {
        echo "<div class='alert alert-danger mt-3'>Erro: O tempo não pode ser zero.</div>";
    } else {
        $velocidade = $distancia / $tempo;
        echo "<div class='alert alert-success mt-3'>A velocidade média é: <strong>".number_format($velocidade, 2, ',', '.')." km/h</strong></div>";
    }
}
require_once 'rodape.php';
?>