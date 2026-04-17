<?php
// Iniciar sesión
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Estado por defecto SOLO si no inicia sesión
if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = 'guest';
}

// Anti-caché
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Constantes de URLs
define('BASE_URL', '/DAM-Transversal');
define('ASSETS_URL', BASE_URL . '/view/assets');
define('VIEW_URL', BASE_URL . '/view');
define('CONTROLLER_URL', BASE_URL . '/controller');
define('AUTH_URL', BASE_URL . '/view/auth');
?>