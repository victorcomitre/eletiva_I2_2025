<?php
$pag_atual = 7;
require_once 'cabecalho.php';
?>

<h1>Exercício 7 - Somar números</h1>
<p>Crie um formulário para que o usuário informe um número. Use um loop while para somar todos os números de 
    1 até o número informado e exibir o resultado.</p>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um número</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular Soma</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['numero'];
    $soma = 0;
    $i = 1;
    if($n > 1){
        while ($i <= $n) {
            $soma += $i;
            $i++;
    }
    $resultado = "A soma de 1 até $n é: <strong>$soma</strong>";
    }
    else{
        while ($i >= $n) {
        $soma += $i;
        $i--;
    }
    $resultado = "A soma de $n até 1 é: <strong>$soma</strong>";
    }
    
    echo "<div class='alert alert-success mt-3'>$resultado</div>";
}
require_once 'rodape.php';
?>