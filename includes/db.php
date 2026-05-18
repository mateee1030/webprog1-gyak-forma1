<?php
try {
    $dbh = new PDO(
        "mysql:host=sql208.infinityfree.com;dbname=if0_41856539_forma1;charset=utf8",
        "if0_41856539",
        "Formaegy",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Kapcsolódási hiba: " . $e->getMessage());
}
?>