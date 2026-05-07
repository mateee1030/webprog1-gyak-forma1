<?php
session_start();
require_once 'includes/db.php';

$url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
$parts = explode('/', $url);
$controller = ($parts[0] !== '') ? $parts[0] : 'fooldal';
$action     = isset($parts[1]) ? $parts[1] : 'index';
$param      = isset($parts[2]) ? $parts[2] : null;

$file = 'controllers/' . $controller . '.php';
if (file_exists($file)) {
    require_once $file;
} else {
    require_once 'controllers/fooldal.php';
}
