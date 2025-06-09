<?php
function verificarPermissao($papeisPermitidos = []) {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?controller=auth&action=login");
        exit;
    }

    if (!in_array($_SESSION['usuario']['papel'], $papeisPermitidos)) {
        echo "<div style='margin: 2rem; color: red; font-weight: bold;'>Acesso negado: você não tem permissão para acessar esta funcionalidade.</div>";
        exit;
    }
}
