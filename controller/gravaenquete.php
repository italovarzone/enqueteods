<?php
require "../view/funcoes.php";
require "../config.php";
require "../model/Enquete.php";
require_once ("../model/EnqueteDAO.php");

cabecalho();
$nome = $_POST['txtods'];
$sugestao = $_POST['txtsugestao'];

verificacampo("Ods", $nome);

try {
    $enquete = new Enquete($sugestao, $nome);
    $enqueteDAO = new EnqueteDAO();
    $enqueteDAO->salvarEnquete($enquete);
    echo "<div class=\"alert alert-success\">Obrigado pela Resposta!</div>";
    header("Refresh: 1; URL=index.php");
} catch (Exception $e) {
    echo "<h1> Erro ao cadastrar. Erro:". $e->getCode()."</h1>";
}
rodape();
?>
