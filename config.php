<?php
class Config {
    public static function getPDO() {
        $pdo = new PDO('mysql:host=localhost;dbname=bdenquete', 'root', '', array(PDO::ATTR_PERSISTENT => true));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>