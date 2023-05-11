<?php
require "../view/funcoes.php";
require "../config.php";
require "../model/Usuario.php";
require "../model/UsuarioDAO.php";

acesso();
cabecalho("Excluir usuários");

$codigo = $_GET["codigo"];

if (UsuarioDAO::excluir($codigo)) {
    echo "<div class=\"alert alert-danger\">
        Usuário Deletado
    </div>";
    header("Refresh: 1; URL=cadusuario.php");
} else {
    echo "Erro ao apagar o usuário!";
}

rodape();
?>