
<?php
include("cabecalho.php");
echo "<h2> Estrutura 2</h2>";
$valor = 25;
if (($valor > 20) && ($valor < 30)) {
    echo "valor maior que 20 e menor que 30";
} else {
    echo "valor menor que 20";
}
include("rodape.php");
?>

