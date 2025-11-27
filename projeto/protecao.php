<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    // se não estálogado leva pro login e mata o script
    header("Location: login.php");
    exit;
}
?>