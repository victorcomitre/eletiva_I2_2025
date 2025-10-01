<?php
$pag_atual = 4;
require_once 'cabecalho.php';
?>

<h1>Exercício 4 - Validar data</h1>
<p>Crie um programa em PHP que leia três valores: dia, mês e ano. Verifique se a data 
    informada é válida e apresente a data em formato dd/mm/YYYY.</p>
<form method="post">
    <div class="row">
        <div class="col"><input type="number" name="dia" class="form-control" placeholder="Dia" required></div>
        <div class="col"><input type="number" name="mes" class="form-control" placeholder="Mês" required></div>
        <div class="col"><input type="number" name="ano" class="form-control" placeholder="Ano" required></div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Validar</button>
</form>

<?php
function validarData($dia, $mes, $ano) {
    // função interna checkdate()
    if (checkdate($mes, $dia, $ano)) {
        $d = str_pad($dia, 2, "0", STR_PAD_LEFT);
        $m = str_pad($mes, 2, "0", STR_PAD_LEFT);
        return "A data $d/$m/$ano é <strong>VÁLIDA</strong>.";
    } else {
        return "A data $dia/$mes/$ano é <strong>INVÁLIDA</strong>.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $resultado = validarData($dia, $mes, $ano);
    echo "<div class='alert alert-success mt-3'><p>$resultado</p></div>";
}
require_once 'rodape.php';
?>