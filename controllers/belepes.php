<?php
$errors = [];
$reg_errors = [];
$reg_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login_submit'])) {
        $login = trim($_POST['login']);
        $jelszo = $_POST['jelszo'];
        if ($login === '' || $jelszo === '') {
            $errors[] = 'Kérjük töltse ki az összes mezőt!';
        } else {
            $stmt = $dbh->prepare("SELECT * FROM felhasznalo WHERE login = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($jelszo, $user['jelszo'])) {
                $_SESSION['user'] = $user['login'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_fullname'] = $user['vezeteknev'].' '.$user['keresztnev'];
                header('Location: index.php?url=fooldal');
                exit;
            } else {
                $errors[] = 'Hibás felhasználónév vagy jelszó!';
            }
        }
    }
    if (isset($_POST['reg_submit'])) {
        $vez  = trim($_POST['vezeteknev']);
        $ker  = trim($_POST['keresztnev']);
        $log  = trim($_POST['reg_login']);
        $jel  = $_POST['reg_jelszo'];
        $jel2 = $_POST['reg_jelszo2'];
        if ($vez===''||$ker===''||$log===''||$jel==='') $reg_errors[]='Minden mező kötelező!';
        if ($jel !== $jel2) $reg_errors[]='A két jelszó nem egyezik!';
        if (strlen($jel)<6)  $reg_errors[]='A jelszó legalább 6 karakter legyen!';
        if (empty($reg_errors)) {
            $check = $dbh->prepare("SELECT id FROM felhasznalo WHERE login=?");
            $check->execute([$log]);
            if ($check->fetch()) {
                $reg_errors[] = 'Ez a felhasználónév már foglalt!';
            } else {
                $stmt = $dbh->prepare("INSERT INTO felhasznalo (vezeteknev,keresztnev,login,jelszo) VALUES(?,?,?,?)");
                $stmt->execute([$vez,$ker,$log,password_hash($jel,PASSWORD_DEFAULT)]);
                $reg_success = true;
            }
        }
    }
}
require 'views/belepes/index.php';
