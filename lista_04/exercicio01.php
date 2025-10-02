<?php
$pag_atual = 1;
require_once 'cabecalho.php';
?>

<h1>Contatos</h1>
<p>Crie um formulário que leia dados de 5 contatos: nome e número de telefone. Leia os dados e crie um mapa ordenado 
    onde as chaves são os nomes dos contatos e os valores são os números de telefone. Verifique se há duplicatas de nome 
    ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.</p>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h5>Contato <?= $i ?></h5>
        <div class="row mb-3">
            <div class="col"><input type="text" name="nomes[]" class="form-control" placeholder="Nome" required></div>
            <div class="col"><input type="text" name="telefones[]" class="form-control" placeholder="Telefone" required></div>
        </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $telefones = $_POST['telefones'];
    $contatos = [];
    $erros = [];

    // mapa de contatos + verificação de duplicatas
    for ($i = 0; $i < count($nomes); $i++) {
        $nome = $nomes[$i];
        $telefone = $telefones[$i];

        if (array_key_exists($nome, $contatos)) {
            $erros[] = "Erro: O nome '$nome' já existe.";
        } elseif (in_array($telefone, $contatos)) {
            $erros[] = "Erro: O telefone '$telefone' já está em uso.";
        } else {
            $contatos[$nome] = $telefone;
        }
    }

    // ordena o mapa pela chave (nome do contato)
    ksort($contatos);

    echo "<div class='alert alert-success mt-3'>";
    echo "<h3>Lista ordenada de contatos</h3>";

    // erros
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<p class='text-danger'>$erro</p>";
        }
    }
    foreach ($contatos as $nome => $telefone) {
        echo "<p><strong>Nome:</strong> $nome - <strong>Telefone:</strong> $telefone</p>";
    }
    echo "</div>";
}
require_once 'rodape.php';
?>