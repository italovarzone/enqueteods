<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'bdenquete');

require_once ("Enquete.php");

class EnqueteDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Config::getPDO();
    }

    public function salvarEnquete($enquete) {
        $pdo = Config::getPDO();
        $consulta = $pdo->prepare("INSERT INTO ods (sugestao, nome, data) VALUES (?, ?, ?)");
        $consulta->execute([$enquete->getSugestao(), $enquete->getNome(), $enquete->getData()]);
    }    

  public static function consultaEnquete() {
    $pdo = Config::getPDO();
    $consulta = $pdo->prepare("SELECT * FROM ods ORDER BY codigo");
    $consulta->execute();

    $resultados = array();
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $resultados[] = $row;
    }
    return $resultados;
}

  public static function consultaTotais() {
    $pdo = Config::getPDO();
    $consulta = $pdo->prepare("SELECT sugestao, count(*) as total FROM ods GROUP BY sugestao ORDER BY sugestao");
    $consulta->execute();

    $resultados = array();
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $resultados[] = $row;
    }
    return $resultados;
}
}
?>