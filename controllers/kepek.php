<?php
$kepek = [];
$upload_error = '';
$upload_success = '';

if ($action === 'feltoltes' && isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cim = trim($_POST['cim'] ?? '');
        if (isset($_FILES['kep']) && $_FILES['kep']['error'] === 0) {
            $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
            if (!in_array($_FILES['kep']['type'], $allowed)) {
                $upload_error = 'Csak jpg, png, gif, webp fájl tölthető fel!';
            } elseif ($_FILES['kep']['size'] > 5*1024*1024) {
                $upload_error = 'A fájl mérete max. 5 MB lehet!';
            } else {
                $ext = pathinfo($_FILES['kep']['name'], PATHINFO_EXTENSION);
                $ujnev = uniqid('kep_').'.'.$ext;
                move_uploaded_file($_FILES['kep']['tmp_name'], 'uploads/'.$ujnev);
                $stmt = $dbh->prepare("INSERT INTO kep (fajlnev,cim,feltolto_id) VALUES(?,?,?)");
                $stmt->execute([$ujnev, $cim, $_SESSION['user_id']]);
                $upload_success = 'A kép sikeresen feltöltve!';
            }
        } else {
            $upload_error = 'Kérjük válasszon képfájlt!';
        }
    }
    require 'views/kepek/feltoltes.php';
} else {
    $stmt = $dbh->query("SELECT k.*,f.vezeteknev,f.keresztnev FROM kep k LEFT JOIN felhasznalo f ON k.feltolto_id=f.id ORDER BY k.feltoltve DESC");
    $kepek = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require 'views/kepek/index.php';
}
