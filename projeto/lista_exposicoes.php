<?php
require_once 'conexao.php';
require_once 'protecao.php';

if (isset($_GET['excluir'])) {
    $id_excluir = $_GET['excluir'];
    try {
        $pdo->prepare("DELETE FROM exposicao WHERE id = ?")->execute([$id_excluir]);
        // Redireciona para a mesma página
        header("Location: lista_exposicoes.php?sucesso=excluido");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao excluir: " . $e->getMessage();
    }
}

try {
    $sql = "SELECT * FROM exposicao ORDER BY data_inicio DESC";
    $stmt = $pdo->query($sql);
    $exposicoes = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}

$titulo_pag = 'Exposições';
include 'cabecalho.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Calendário de exposições</h2>

    <div class="d-flex gap-2">
        <button class="btn btn-secondary d-print-none" onclick="window.print()">
            <i class="bi bi-printer"></i>
        </button>

        <a href="form_exposicao.php" class="btn btn-dark d-print-none">
            <i class="bi bi-plus-lg"></i> NOVA EXPOSIÇÃO
        </a>
    </div>
</div>

<?php if(isset($_GET['sucesso'])): ?>
    <div class="alert alert-success d-print-none">Exposição excluído com sucesso!</div>
<?php endif; ?>
<?php if(isset($erro)): ?>
    <div class="alert alert-danger d-print-none"><?= $erro ?></div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tema</th>
                <th>Galeria</th>
                <th>Período</th>
                <th width="250" class="text-end d-print-none">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exposicoes as $e):
                $inicio = date('d/m/Y', strtotime($e['data_inicio']));
                $fim = date('d/m/Y', strtotime($e['data_fim']));
            ?>
                <tr>
                    <td><strong><?= htmlspecialchars($e['tema']) ?></strong></td>
                    <td><?= htmlspecialchars($e['galeria']) ?></td>
                    <td><?= $inicio ?> até <?= $fim ?></td>
                    <td class="text-end d-print-none">
                        <a href="gerenciar_exposicao.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-dark" title="Obras">Obras</a>

                        <a href="form_exposicao.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <a href="lista_exposicoes.php?excluir=<?= $e['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'rodape.php'; ?>