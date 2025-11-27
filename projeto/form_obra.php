<?php
require_once 'conexao.php';
require_once 'protecao.php';

$id = '';
$titulo = '';
$tecnica = '';
$data_criacao = '';
$artista_id = '';
$titulo_pag = 'Nova obra';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $tecnica = $_POST['tecnica'];
    $data_criacao = $_POST['data_criacao'];
    $artista_id = $_POST['artista_id'];

    try {
        if (empty($id)) {
            // INSERT
            $sql = "INSERT INTO obra (titulo, tecnica, data_criacao, artista_id) VALUES (?, ?, ?, ?)";
            $pdo->prepare($sql)->execute([$titulo, $tecnica, $data_criacao, $artista_id]);
        } else {
            // UPDATE
            $sql = "UPDATE obra SET titulo=?, tecnica=?, data_criacao=?, artista_id=? WHERE id=?";
            $pdo->prepare($sql)->execute([$titulo, $tecnica, $data_criacao, $artista_id, $id]);
        }
        header("Location: lista_obras.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao salvar: " . $e->getMessage();
    }
}

$lista_artistas = $pdo->query("SELECT id, nome FROM artista ORDER BY nome")->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obra WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $obra = $stmt->fetch();

    if ($obra) {
        $titulo = $obra['titulo'];
        $tecnica = $obra['tecnica'];
        $data_criacao = $obra['data_criacao'];
        $artista_id = $obra['artista_id']; // dono da obra
        $titulo_pag = 'EDITAR OBRA';
    }
}

include 'cabecalho.php'; 
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="mb-4"><?= $titulo_pag ?></h3>

            <?php if(isset($erro)): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($titulo) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Técnica</label>
                    <input type="text" name="tecnica" class="form-control" value="<?= htmlspecialchars($tecnica) ?>" placeholder="Ex: Óleo sobre tela">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ano</label>
                    <input type="number" name="data_criacao" class="form-control" value="<?= $data_criacao ?>" placeholder="AAAA">
                </div>

                <div class="mb-3">
                    <label class="form-label">Artista (Autor)</label>
                    <select name="artista_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($lista_artistas as $art): ?>
                            <option value="<?= $art['id'] ?>" <?= ($art['id'] == $artista_id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($art['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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