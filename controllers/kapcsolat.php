<?php
$errors = [];
$success = false;
$data = ['nev'=>'','email'=>'','targy'=>'','uzenet'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['nev']    = trim($_POST['nev'] ?? '');
    $data['email']  = trim($_POST['email'] ?? '');
    $data['targy']  = trim($_POST['targy'] ?? '');
    $data['uzenet'] = trim($_POST['uzenet'] ?? '');

    // Szerver oldali validáció
    if ($data['nev'] === '')    $errors[] = 'A név megadása kötelező!';
    if ($data['email'] === '')  $errors[] = 'Az e-mail cím megadása kötelező!';
    elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Érvénytelen e-mail cím!';
    if ($data['targy'] === '')  $errors[] = 'A tárgy megadása kötelező!';
    if ($data['uzenet'] === '') $errors[] = 'Az üzenet megadása kötelező!';
    elseif (strlen($data['uzenet']) < 10) $errors[] = 'Az üzenet legalább 10 karakter legyen!';

    if (empty($errors)) {
        $felh_id = $_SESSION['user_id'] ?? null;
        $stmt = $dbh->prepare(
            "INSERT INTO uzenet (nev,email,targy,uzenet,felh_id) VALUES(?,?,?,?,?)"
        );
        $stmt->execute([$data['nev'],$data['email'],$data['targy'],$data['uzenet'],$felh_id]);
        $success = true;
        $data = ['nev'=>'','email'=>'','targy'=>'','uzenet'=>''];
    }
}
require 'views/kapcsolat/index.php';
