<?php
require_once 'conexao.php';
session_start();

// LOGOUT
if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// leva ao INDEX.php
if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

// LOGIN
$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: index.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - ARTControl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="icone.png">
    <style>body { background-color: #e9ecef; display: flex; align-items: center; justify-content: center; min-height: 100vh; } .card-login { width: 100%; max-width: 400px; padding: 20px; }</style>
</head>
<body>
    <div class="card card-login shadow border-0">
        <div class="card-body text-center">
            <h1 class="mb-4" style="font-family: 'Playfair Display', serif;">ARTControl</h1>
            
            <?php if($erro): ?><div class="alert alert-danger"><?= $erro ?></div><?php endif; ?>
            <?php if(isset($_GET['cadastrado'])): ?><div class="alert alert-success">Cadastro realizado! Entre.</div><?php endif; ?>

            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <label>E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    <label>Senha</label>
                </div>
                <button class="btn btn-dark w-100 py-2" type="submit">
                    <i class="bi bi-box-arrow-right"></i> Entrar
                </button>
            </form>

            <div class="mt-4 pt-3 border-top">
                <p class="text-muted"><small>Não tem uma conta?</small></p>
                <a href="cadastro.php" class="btn btn-outline-dark w-100">Registre-se</a>
            </div>
        </div>
    </div>
</body>
</html>