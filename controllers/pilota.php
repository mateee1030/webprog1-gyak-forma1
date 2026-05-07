<?php
switch ($action) {
  case 'index':
  case 'list':
    $stmt = $dbh->query("SELECT * FROM pilota ORDER BY nev");
    $pilotak = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require 'views/pilota/list.php';
    break;

  case 'new':
    $pilota = ['az'=>'','nev'=>'','nem'=>'F','szuldat'=>'','nemzet'=>''];
    $errors = [];
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $pilota['nev']    = trim($_POST['nev']);
        $pilota['nem']    = $_POST['nem'];
        $pilota['szuldat']= $_POST['szuldat'];
        $pilota['nemzet'] = trim($_POST['nemzet']);
        if ($pilota['nev']==='')     $errors[]='A név megadása kötelező!';
        if ($pilota['szuldat']==='') $errors[]='A születési dátum kötelező!';
        if ($pilota['nemzet']==='')  $errors[]='A nemzetiség kötelező!';
        if (empty($errors)) {
            $s=$dbh->prepare("INSERT INTO pilota (nev,nem,szuldat,nemzet) VALUES(?,?,?,?)");
            $s->execute([$pilota['nev'],$pilota['nem'],$pilota['szuldat'],$pilota['nemzet']]);
            header('Location: index.php?url=pilota/list');exit;
        }
    }
    require 'views/pilota/form.php';
    break;

  case 'edit':
    $s=$dbh->prepare("SELECT * FROM pilota WHERE az=?");
    $s->execute([$param]);
    $pilota=$s->fetch(PDO::FETCH_ASSOC);
    if(!$pilota){header('Location: index.php?url=pilota/list');exit;}
    $errors=[];
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $pilota['nev']    = trim($_POST['nev']);
        $pilota['nem']    = $_POST['nem'];
        $pilota['szuldat']= $_POST['szuldat'];
        $pilota['nemzet'] = trim($_POST['nemzet']);
        if ($pilota['nev']==='')     $errors[]='A név megadása kötelező!';
        if ($pilota['szuldat']==='') $errors[]='A születési dátum kötelező!';
        if ($pilota['nemzet']==='')  $errors[]='A nemzetiség kötelező!';
        if (empty($errors)) {
            $s=$dbh->prepare("UPDATE pilota SET nev=?,nem=?,szuldat=?,nemzet=? WHERE az=?");
            $s->execute([$pilota['nev'],$pilota['nem'],$pilota['szuldat'],$pilota['nemzet'],$param]);
            header('Location: index.php?url=pilota/list');exit;
        }
    }
    require 'views/pilota/form.php';
    break;

  case 'delete':
    $s=$dbh->prepare("DELETE FROM pilota WHERE az=?");
    $s->execute([$param]);
    header('Location: index.php?url=pilota/list');exit;

  default:
    header('Location: index.php?url=pilota/list');exit;
}
