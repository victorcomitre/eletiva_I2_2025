<?php
    $dominio = "mysql:host=localhost;dbname=projetophp"; //String de conexão, PDO é uma classe interna do PHP
    $usuario = "root";
    $senha = "";

    try {
        $pdo = new PDO($dominio, $usuario, $senha);

    } catch (Exception $e) {
        die("Erro ao conectar o banco!".$e->getMessage());
    }

?>