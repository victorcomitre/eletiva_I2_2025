<?php
require_once 'conexao.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica duplicidade
    $check = $pdo->prepare("SELECT id FROM usuario WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() == 1) {
        $erro = "Este e-mail já está cadastrado.";
    } else {
        // senão cadastra
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)")->execute([$nome, $email, $hash]);
        header("Location: login.php?cadastrado=true");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - ARTControl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="icone.png">
    <style>body { background-color: #e9ecef; display: flex; align-items: center; justify-content: center; min-height: 100vh; } .card-login { width: 100%; max-width: 400px; padding: 20px; }</style>
</head>
<body>
    <div class="card card-login shadow border-0">
        <div class="card-body text-center">
            <h2 class="mb-3" style="font-family: 'Playfair Display', serif;">CADASTRE-SE</h2>
            
            <?php if($erro): ?>
                <div class="alert alert-warning"><?= $erro ?></div><?php endif; ?>

            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="" required>
                    <label for="nome">Nome</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email">E-mail</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Password" required>
                    <label for="senha">Senha</label>
                </div>

                <button class="btn btn-dark w-100 py-2" type="submit">
                    <i class="bi bi-save"></i> Registrar
                </button>
            </form>
        <div class="mt-4 pt-3 border-top">
                <p class="text-muted"><small>Já tem uma conta?</small></p>
                <a href="login.php" class="btn btn-outline-secondary w-100"> 
                    <i class="bi bi-box-arrow-right"></i> Entre
                </a>
            </div>    
        </div>
    </div>
</body>
</html>