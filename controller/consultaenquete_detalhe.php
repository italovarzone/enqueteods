<?php
require "../view/funcoes.php";
require "../config.php";
require_once("../model/EnqueteDAO.php");

acesso();

cabecalho("Consulta Totais");

$resultados = EnqueteDAO::consultaTotais();

echo "<table widht=\"100%\" class=\"table\">
<tr>
<th>Título ODS</th>
<th>Total de Votos</th>
</tr>";

foreach ($resultados as $row) {
    echo "<tr>
        <td>{$row['sugestao']}</td>
        <td><img src=\"../img/barra.png\" width=\"{$row['total']}\" height=\"20\">&zwnj; {$row['total']}</td>
    </tr>";
}

echo "</table>";
rodape();


?>