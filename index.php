<?php
session_start();
require_once './includes/db.php';
require_once './includes/config.inc.php';

if (isset($_GET['url']) && $_GET['url'] != '') {
    $url = trim($_GET['url'], '/');
    $parts = explode('/', $url);

    $controller = ($parts[0] !== '') ? $parts[0] : 'fooldal';
    $action     = isset($parts[1]) ? $parts[1] : 'index';
    $param      = isset($parts[2]) ? $parts[2] : null;

    if ($controller == 'pilota') {
        require_once './controllers/pilota.php';
        exit();
    }
}

$oldal = $_SERVER['QUERY_STRING'];

if ($oldal != "") {
    if (isset($oldalak[$oldal])) {
        $keres = $oldalak[$oldal];
    } else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }
} else {
    $keres = $oldalak['/'];
}

$oldalFajl = './views/' . $keres['fajl'] . '/index.php';

include './views/layout_top.php';

if (file_exists($oldalFajl)) {
    include $oldalFajl;
} else {
    echo '<div class="alert alert-danger">A nézetfájl nem található.</div>';
}

include './views/layout_bottom.php';
?>