<?php
require_once 'conexao.php';
require_once 'protecao.php';

$id = '';
$nome = '';
$nacionalidade = '';
$biografia = '';
$titulo_pag = 'Novo artista';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nac = $_POST['nacionalidade'];
    $bio = $_POST['biografia'];

    try {
        // INSERT
        if (empty($id)) {
            $sql = "INSERT INTO artista (nome, nacionalidade, biografia) VALUES (?, ?, ?)";
            $pdo->prepare($sql)->execute([$nome, $nac, $bio]);
        } else {
            // UPDATE
            $sql = "UPDATE artista SET nome=?, nacionalidade=?, biografia=? WHERE id=?";
            $pdo->prepare($sql)->execute([$nome, $nac, $bio, $id]);
        }
        header("Location: lista_artistas.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao salvar: " . $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM artista WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $a = $stmt->fetch();
    if ($a) {
        $id = $a['id'];
        $nome = $a['nome'];
        $nacionalidade = $a['nacionalidade'];
        $biografia = $a['biografia'];
        $titulo_pag = 'Editar artista';
    }
}
include 'cabecalho.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3><?= $titulo_pag ?></h3>

            <?php if(isset($erro)): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= $nome ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nacionalidade</label>
                    <input type="text" name="nacionalidade" class="form-control" value="<?= $nacionalidade ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Biografia</label>
                    <textarea name="biografia" class="form-control"><?= $biografia ?></textarea>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-save"></i> Salvar
                    </button>
                    <a href="lista_exposicoes.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'rodape.php'; ?>