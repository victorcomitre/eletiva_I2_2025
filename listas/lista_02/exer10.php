<?php
$pag_atual = 10;
require_once 'cabecalho.php';
?>

<h1>Exercício 10 - Tabuada com for</h1>
<p>Crie um formulário para que o usuário informe um número. Use um loop for para imprimir a tabuada desse número de 1 a 10</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um número</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Gerar tabuada</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['numero'];
    $tabuada = "";

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $n * $i;
        $tabuada .= "$n x $i = $resultado <br>";
    }
    
    echo "<div class='alert alert-success mt-3'><strong>Tabuada do $n:</strong><br>$tabuada</div>";
}
require_once 'rodape.php';
?>