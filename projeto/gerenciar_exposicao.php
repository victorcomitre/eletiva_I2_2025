<?php
require_once 'conexao.php';
require_once 'protecao.php';

// se veio o ID da exposição então abre
if (!isset($_GET['id'])) {
    header("Location: lista_exposicoes.php");
    exit;
}

$exposicao_id = $_GET['id'];

// selecionar os dados da exposição
$stmt = $pdo->prepare("SELECT * FROM exposicao WHERE id = ?");
$stmt->execute([$exposicao_id]);
$exposicao = $stmt->fetch();

if (!$exposicao) {
    die("Exposição não encontrada.");
}

// incluir obra na exposição
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['obra_id'])) {
    $obra_id = $_POST['obra_id'];
    try {
        // Tenta inserir. Se já existir vai cair no catch e ignora
        $sql = "INSERT INTO exposicao_obra (exposicao_id, obra_id) VALUES (?, ?)";
        $pdo->prepare($sql)->execute([$exposicao_id, $obra_id]);
    } catch (PDOException $e) {
        // não faz nada
    }
}

// remover obra na exposição
if (isset($_GET['remover_obra'])) {
    $obra_rem_id = $_GET['remover_obra'];
    $sql = "DELETE FROM exposicao_obra WHERE exposicao_id = ? AND obra_id = ?";
    $pdo->prepare($sql)->execute([$exposicao_id, $obra_rem_id]);

    header("Location: gerenciar_exposicao.php?id=$exposicao_id");
    exit;
}

// obras de uma exposição. Join: exposicao_obra -> obra -> artista)
$sql_lista = "SELECT eo.obra_id, o.titulo, o.data_criacao AS ano, a.nome as nome_artista 
              FROM exposicao_obra eo
              JOIN obra o ON eo.obra_id = o.id
              JOIN artista a ON o.artista_id = a.id
              WHERE eo.exposicao_id = ?
              ORDER BY o.titulo";
$stmt = $pdo->prepare($sql_lista);
$stmt->execute([$exposicao_id]);
$obras_na_exposicao = $stmt->fetchAll();

$todas_obras = $pdo->query("SELECT id, titulo FROM obra ORDER BY titulo")->fetchAll();
include 'cabecalho.php';
?>
<div class="row mb-4 border-bottom pb-2">
    <div class="col-md-8">
        <small class="text-muted">EXPOSIÇÃO</small>
        <h1 class="display-6"><?= htmlspecialchars($exposicao['tema']) ?></h1>
        <p class="text-muted">Local: <?= htmlspecialchars($exposicao['galeria']) ?></p>
    </div>
    <div class="col-md-4 text-end align-self-center">
        <a href="lista_exposicoes.php" class="btn btn-outline-secondary">Voltar</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm p-4 bg-light">
            <h5 class="mb-3">Adicionar Obra</h5>
            <form method="POST">
                <div class="mb-3">

                    <select name="obra_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($todas_obras as $o): ?>
                            <option value="<?= $o['id'] ?>"><?= htmlspecialchars($o['titulo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark w-100">
                    <i class="bi bi-box-arrow-in-up-right"></i> Incluir
                </button>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="m-0">Catálogo [<?= count($obras_na_exposicao) ?> obra(s)]</h5>
            </div>
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Obra</th>
                        <th>Ano</th>
                        <th>Autor</th>
                        <th class="text-end">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($obras_na_exposicao) > 0): ?>
                        <?php foreach ($obras_na_exposicao as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['titulo']) ?></td>
                                <td><?= htmlspecialchars($item['ano']) ?></td>
                                <td><?= htmlspecialchars($item['nome_artista']) ?></td>
                                <td class="text-end">
                                    <a href="gerenciar_exposicao.php?id=<?= $exposicao_id ?>&remover_obra=<?= $item['obra_id'] ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Remover desta exposição">
                                        <i class="bi bi-box-arrow-down-left"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">Nenhuma obra selecionada para esta exposição ainda.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'rodape.php'; ?>