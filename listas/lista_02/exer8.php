<?php
$pag_atual = 8;
require_once 'cabecalho.php';
?>

<h1>Exercício 8 - Contagem regressiva</h1>
<p>Crie um formulário para que o usuário informe um número. Use um loop do-while para exibir uma contagem 
    regressiva a partir do número informado até 1</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um número</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Executar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['numero'];
    $resultado = "";
    $i = $n;
    if ($i > 0) {
        do {
            $resultado.= $i." ";
            $i--;
        } while ($i >= 1);
    }
    else{
        $resultado = "Escreva um número maior ou igual a 1";
    }

    echo "<div class='alert alert-success mt-3'>Contagem regressiva: <br><strong>$resultado</strong></div>";
}
require_once 'rodape.php';
?>