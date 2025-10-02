<?php
$pag_atual = 9;
require_once 'cabecalho.php';
?>

<h1>Exercício 9 - Fatorial com for</h1>
<p>Crie um formulário para que o usuário informe um número. Use um loop for para calcular o fatorial desse 
    número e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um número</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['numero'];
    $fatorial = 1;

    for ($i = 1; $i <= $n; $i++) {
        $fatorial *= $i;
    }
    
    echo "<div class='alert alert-success mt-3'>O fatorial de $n é: <strong>$fatorial</strong></div>";
}
require_once 'rodape.php';
?>