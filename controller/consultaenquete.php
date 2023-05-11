<?php
/*consultaenquete.php*/
require "../view/funcoes.php";
require "../config.php";
require_once ("../model/EnqueteDAO.php");

acesso();

cabecalho("Consulta Enquete");

$enquetes = EnqueteDAO::consultaEnquete();

echo "<table width=\"100%\" border>
<tr>
    <td>Motivo</td>
    <td>Título ODS</td>
    <td>Data</td>
</tr>";

$conta = 0;
foreach ($enquetes as $enquete) {
    $data = data($enquete['data']);
    echo "<tr>
        <td>{$enquete['nome']}</td>
        <td>{$enquete['sugestao']}</td>
        <td> $data </td>
    </tr>";
    $conta++;
}

echo "</table>Total de resposta $conta";
rodape();
?>