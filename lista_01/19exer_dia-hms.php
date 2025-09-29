<?php
$pag_atual = 19;
require_once 'cabecalho.php';
?>
<h1>Exercicio 19 - Conversor de dias em horas, minutos ou segundos</h1>
<form method="post">
    <div class="mb-3">
        <label for="dias" class="form-label">Informe a quantidade de dias</label>
        <input type="number" id="dias" name="dias" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dias = $_POST['dias'];

    $horas = $dias * 24;
    $minutos = $horas * 60;
    $segundos = $minutos * 60;

    echo "<div class='alert alert-info mt-3'>";
    echo "<strong>{$dias}</strong> dia(s) equivalem a:<br>";
    echo "<ul>";
    echo "<li><strong>" . number_format($horas, 0, ',', '.') . "</strong> horas</li>";
    echo "<li><strong>" . number_format($minutos, 0, ',', '.') . "</strong> minutos</li>";
    echo "<li><strong>" . number_format($segundos, 0, ',', '.') . "</strong> segundos</li>";
    echo "</ul>";
    echo "</div>";
}
require_once 'rodape.php';
?>