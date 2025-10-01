<?php
$pag_atual = 6;
require_once 'cabecalho.php';
?>

<h1>Exercício 6 - Imprimir números</h1>
<p>Crie um formulário para que o usuário informe um número. Use um loop for para imprimir todos os números 
    de 1 até o número informado.</p>
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
    if($n > 1){
        for ($i = 1; $i <= $n; $i++) {
            $resultado.= $i." ";
        }}
    else {
        for ($i = 1; $i >= $n; $i--) {
            $resultado.= $i." ";
        }
    }
    echo "<div class='alert alert-success mt-3'>Sequência: <br><strong>$resultado</strong></div>";
}
require_once 'rodape.php';
?>