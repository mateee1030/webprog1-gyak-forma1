<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?url=belepes');
    exit;
}

$stmt = $dbh->query(
    "SELECT u.*, f.vezeteknev, f.keresztnev 
     FROM uzenet u 
     LEFT JOIN felhasznalo f ON u.felh_id = f.id 
     ORDER BY u.id DESC"
);
$uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'views/uzenetek/index.php';