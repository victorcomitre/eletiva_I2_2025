<?php
$pag_atual = 11;
require_once 'cabecalho.php';
?>
<h1>Exercício 11 - Perímetro do círculo</h1>
<p>Crie um formulário que permita ao usuário inserir o raio de um círculo. O script PHP deve
calcular o perímetro do círculo (2πr) e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="raio" class="form-label">Raio</label>
        <input type="number" class="form-control" id="raio" name="raio" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Perímetro</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $raio = $_POST['raio'];
    $perimetro = 2 * M_PI * $raio;
    echo "<div class='alert alert-success mt-3'>O perímetro de um círculo com raio <strong>$raio</strong> é: <strong>".number_format($perimetro, 2, ',', '.') . "</strong></div>";
}
require_once 'rodape.php';
?>