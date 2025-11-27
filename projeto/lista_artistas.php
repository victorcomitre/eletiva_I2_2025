<?php
require_once 'conexao.php';
require_once 'protecao.php';

if (isset($_GET['excluir'])) {
    $id_excluir = $_GET['excluir'];
    try {
        $pdo->prepare("DELETE FROM artista WHERE id = ?")->execute([$id_excluir]);
        // Redireciona para a mesma página
        header("Location: lista_artistas.php?sucesso=excluido");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao excluir: " . $e->getMessage();
    }
}

try {
    $sql = "SELECT * FROM artista ORDER BY nome";
    $stmt = $pdo->query($sql);
    $artistas = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}

$titulo_pag = 'Artistas';
include 'cabecalho.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Artistas cadastrados</h2>

    <div class="d-flex gap-2">
        <button class="btn btn-secondary d-print-none" onclick="window.print()">
            <i class="bi bi-printer"></i>
        </button>

        <a href="form_artista.php" class="btn btn-dark d-print-none">
            <i class="bi bi-plus-lg"></i> NOVO ARTISTA
        </a>
    </div>
</div>

<?php if(isset($_GET['sucesso'])): ?>
    <div class="alert alert-success d-print-none">Artista excluído com sucesso!</div>
<?php endif; ?>
<?php if(isset($erro)): ?>
    <div class="alert alert-danger d-print-none"><?= $erro ?></div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th width="150" class="d-print-none">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artistas as $a): ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= htmlspecialchars($a['nome']) ?></td>
                    <td><?= htmlspecialchars($a['nacionalidade']) ?></td>
                    <td class="d-print-none">
                        <a href="form_artista.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="lista_artistas.php?excluir=<?= $a['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir este artista?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'rodape.php'; ?>