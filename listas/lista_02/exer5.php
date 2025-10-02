<?php
$pag_atual = 5;
require_once 'cabecalho.php';
?>

<h1>Exercício 5 - Nome do mês</h1>
<p>Faça um programa que leia o valor associado a um mês. Exemplo: 1 – Janeiro, 2 – Fevereiro... Exiba o 
    nome do mês associado = USE SWITCH</p>
<form method="post">
    <div class="mb-3">
        <label for="mes" class="form-label">Informe o número do mês (1 a 12)</label>
        <input type="number" id="mes" name="mes" class="form-control" min="1" max="12" required>
    </div>
    <button type="submit" class="btn btn-primary">Verificar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mes_num = $_POST['mes'];
    $mes_nome = "";

    switch ($mes_num) {
        case 1: $mes_nome = "Janeiro"; break;
        case 2: $mes_nome = "Fevereiro"; break;
        case 3: $mes_nome = "Março"; break;
        case 4: $mes_nome = "Abril"; break;
        case 5: $mes_nome = "Maio"; break;
        case 6: $mes_nome = "Junho"; break;
        case 7: $mes_nome = "Julho"; break;
        case 8: $mes_nome = "Agosto"; break;
        case 9: $mes_nome = "Setembro"; break;
        case 10: $mes_nome = "Outubro"; break;
        case 11: $mes_nome = "Novembro"; break;
        case 12: $mes_nome = "Dezembro"; break;
        default: $mes_nome = "Mês inválido!";
    }

    echo "<div class='alert alert-success mt-3'>O mês correspondente é: <strong>$mes_nome</strong></div>";
}
require_once 'rodape.php';
?>