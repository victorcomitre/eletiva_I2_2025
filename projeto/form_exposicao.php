<?php
require_once 'conexao.php';
require_once 'protecao.php';

$id = '';
$tema = '';
$galeria = '';
$data_inicio = '';
$data_fim = '';
$titulo_pag = 'Nova exposição';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tema = $_POST['tema'];
    $galeria = $_POST['galeria'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    try {
        // INSERT
        if (empty($id)) {
            $sql = "INSERT INTO exposicao (tema, galeria, data_inicio, data_fim) VALUES (?, ?, ?, ?)";
            $pdo->prepare($sql)->execute([$tema, $galeria, $data_inicio, $data_fim]);
        } else {
            // UPDATE
            $sql = "UPDATE exposicao SET tema=?, galeria=?, data_inicio=?, data_fim=? WHERE id=?";
            $pdo->prepare($sql)->execute([$tema, $galeria, $data_inicio, $data_fim, $id]);
        }
        header("Location: lista_exposicoes.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao salvar: " . $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM exposicao WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $expo = $stmt->fetch();

    if ($expo) {
        $tema = $expo['tema'];
        $galeria = $expo['galeria'];
        $data_inicio = $expo['data_inicio'];
        $data_fim = $expo['data_fim'];
        $titulo_pag = 'Editar Exposição';
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
                    <label class="form-label">Tema</label>
                    <input type="text" name="tema" class="form-control" value="<?= htmlspecialchars($tema) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Galeria / Local</label>
                    <input type="text" name="galeria" class="form-control" value="<?= htmlspecialchars($galeria) ?>">
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Data de início</label>
                        <input type="date" name="data_inicio" class="form-control" value="<?= $data_inicio ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Data de fim</label>
                        <input type="date" name="data_fim" class="form-control" value="<?= $data_fim ?>">
                    </div>
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