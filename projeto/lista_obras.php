<?php
require_once 'conexao.php';
require_once 'protecao.php';

if (isset($_GET['excluir'])) {
    $id_excluir = $_GET['excluir'];
    try {
        $pdo->prepare("DELETE FROM obra WHERE id = ?")->execute([$id_excluir]);
        // Redireciona para a mesma página
        header("Location: lista_obras.php?sucesso=excluido");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao excluir: " . $e->getMessage();
    }
}

try {
    // JOIN para pegar o nome do artista
    $sql = "SELECT o.*, a.nome as nome_artista 
            FROM obra o 
            JOIN artista a ON o.artista_id = a.id 
            ORDER BY o.titulo";
    $stmt = $pdo->query($sql);
    $obras = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}

$titulo_pag = 'Obras';
include 'cabecalho.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Acervo de obras</h2>

    <div class="d-flex gap-2">
        <button class="btn btn-secondary d-print-none" onclick="window.print()">
            <i class="bi bi-printer"></i>
        </button>

        <a href="form_obra.php" class="btn btn-dark d-print-none">
            <i class="bi bi-plus-lg"></i> NOVA OBRA
        </a>
    </div>
</div>

<?php if(isset($_GET['sucesso'])): ?>
    <div class="alert alert-success d-print-none">Obra excluída com sucesso!</div>
<?php endif; ?>
<?php if(isset($erro)): ?>
    <div class="alert alert-danger d-print-none"><?= $erro ?></div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Técnica</th>
                <th>Ano</th>
                <th>Artista</th>
                <th width="150" class="d-print-none">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obras as $o): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($o['titulo']) ?></strong></td>
                    <td><?= htmlspecialchars($o['tecnica']) ?></td>
                    <td><?= $o['data_criacao'] ?></td>
                    <td><?= htmlspecialchars($o['nome_artista']) ?></td>

                    <td class="d-print-none">
                        <a href="form_obra.php?id=<?= $o['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="lista_obras.php?excluir=<?= $o['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir esta obra?');" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'rodape.php'; ?>