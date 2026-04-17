<?php
// Iniciar sesión si no está activa
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Headers anti-caché para evitar problemas con navegador
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
header("X-UA-Compatible: IE=edge");
header("Content-Type: text/html; charset=UTF-8");
?>
