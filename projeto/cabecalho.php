<?php
require_once 'protecao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<link rel="icon" type="image/png" href="icone.png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo_pag) ? $titulo_pag : 'ARTControl' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="estilo.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4 d-print-none">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="font-family: 'Playfair Display', serif;"><i class="bi bi-palette"></i>ARTCNTRL</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="lista_artistas.php">Artistas</a></li>
                    <li class="nav-item"><a class="nav-link" href="lista_obras.php">Obras</a></li>
                    <li class="nav-item"><a class="nav-link" href="lista_exposicoes.php">Exposições</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <span class="me-3 text-muted nav-link">
                        <a class="nav-link" href="lista_usuarios.php" title="Perfil">
                            <i class="bi bi-person"></i> Olá, <strong><?= $_SESSION['usuario_nome'] ?>!</strong>
                        </a>
                    </span>

                    <a href="login.php?sair=true" class="btn btn-sm" title="Sair">
                        <i class="bi bi-x-circle-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mb-5">