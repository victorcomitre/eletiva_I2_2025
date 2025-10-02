<?php
$pag_atual = 10;
require_once 'cabecalho.php';
?>
<h1>Exercício 10 - Perímetro do retângulo</h1>
<p>Crie um formulário que permita ao usuário inserir a largura e a altura de um retângulo. O script
PHP deve calcular o perímetro do retângulo e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="largura" class="form-label">Largura</label>
        <input type="number" class="form-control" id="largura" name="largura" required>
    </div>
    <div class="mb-3">
        <label for="altura" class="form-label">Altura</label>
        <input type="number" class="form-control" id="altura" name="altura" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Perímetro</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $perimetro = 2 * ($largura + $altura);
    echo "<div class='alert alert-success mt-3'>O perímetro de um retângulo com largura <strong>$largura</strong> e altura <strong>$altura</strong> é: <strong>$perimetro</strong></div>";
}
require_once 'rodape.php';
?>