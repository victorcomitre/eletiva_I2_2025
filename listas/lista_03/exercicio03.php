<?php
$pag_atual = 3;
require_once 'cabecalho.php';
?>

<h1>Exercício 3 - Verificar palavra contida</h1>
<p>Crie um programa em PHP em que sejam lidas duas palavras, e verifique se a segunda palavra está contida na primeira.</p>
<form method="post">
    <div class="mb-3">
        <label for="principal" class="form-label">Texto principal</label>
        <input type="text" id="principal" name="principal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="busca" class="form-label">Palavra a ser buscada</label>
        <input type="text" id="busca" name="busca" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Verificar</button>
</form>

<?php
function verificarContido($texto, $palavra) {
    // função interna strpos()
    if (strpos($texto, $palavra) !== false) {
        return "Sim, a palavra <strong>'$palavra'</strong> está contida em <strong>'$texto'</strong>.";
    } else {
        return "Não, a palavra <strong>'$palavra'</strong> NÃO está contida em <strong>'$texto'</strong>.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $principal = $_POST['principal'];
    $busca = $_POST['busca'];
    $resultado = verificarContido($principal, $busca);
    echo "<div class='alert alert-success mt-3'><p>$resultado</p></div>";
}
require_once 'rodape.php';
?>