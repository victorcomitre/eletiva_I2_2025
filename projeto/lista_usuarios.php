<?php
require_once 'conexao.php';
require_once 'protecao.php';

if (isset($_GET['excluir'])) {
    $id_excluir = $_GET['excluir'];
    try {
        $pdo->prepare("DELETE FROM usuario WHERE id = ?")->execute([$id_excluir]);
        // Redireciona para a mesma página
        header("Location: lista_usuarios.php?sucesso=excluido");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao excluir: " . $e->getMessage();
    }
}

try {
    $id_logado = $_SESSION['usuario_id'];
    
    $sql = "SELECT * FROM usuario WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_logado]);
    $usuarios = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}

$titulo_pag = 'Perfil';
include 'cabecalho.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Usuário</h2>
</div>

<?php if(isset($_GET['sucesso'])): ?>
    <div class="alert alert-success d-print-none">Usuario excluído com sucesso!</div>
<?php endif; ?>
<?php if(isset($erro)): ?>
    <div class="alert alert-danger d-print-none"><?= $erro ?></div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th width="150">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['nome']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <a href="form_usuario.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="lista_usuarios.php?excluir=<?= $u['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir este usuário?');" title="Excluir usuário">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'rodape.php'; ?>