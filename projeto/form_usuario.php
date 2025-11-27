<?php
require_once 'conexao.php';
require_once 'protecao.php';

$id = ''; 
$nome = ''; 
$email = '';
$titulo_pag = 'Usuário';

if (isset($_GET['id']) && $_GET['id'] != $_SESSION['usuario_id']) {
    die("Acesso Negado!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Segurança no POST
    if (!empty($id) && $id != $_SESSION['usuario_id']) {
        die("Acesso Negado ao salvar.");
    }

    try {
        if (empty($id)) {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $pdo->prepare($sql)->execute([$nome, $email, $senha_hash]);
        } else {
            // UPDATE
            if (!empty($senha)) {
                // Com troca de senha
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "UPDATE usuario SET nome=?, email=?, senha=? WHERE id=?";
                $pdo->prepare($sql)->execute([$nome, $email, $senha_hash, $id]);
            } else {
                // Sem troca de senha
                $sql = "UPDATE usuario SET nome=?, email=? WHERE id=?";
                $pdo->prepare($sql)->execute([$nome, $email, $id]);
            }
        }
        
        // atualizar nome na sessão
        if ($id == $_SESSION['usuario_id']) {
            $_SESSION['usuario_nome'] = $nome;
        }

        header("Location: lista_usuarios.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao salvar: " . $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
    $stmt->execute([$id]);
    $u = $stmt->fetch();
    if ($u) {
        $nome = $u['nome'];
        $email = $u['email'];
        $titulo_pag = 'Editar usuário';
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
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($nome) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail (Login)</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="<?= $id ? 'Deixe em branco para manter a atual' : '' ?>" <?= $id ? '' : 'required' ?>>
                    <?php if($id): ?>
                        <small class="text-muted">Preencha apenas se quiser alterar a senha.</small>
                    <?php endif; ?>
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