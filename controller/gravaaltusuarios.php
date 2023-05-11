<?php
require "../view/funcoes.php";
require "../config.php";
require "../model/Usuario.php";
require "../model/UsuarioDAO.php";

cabecalho("Grava Usuários");

$codigo = $_POST["codigo"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$senha2 = $_POST["senha2"];

if ($nome == "") {
    header("Location: alterarusuarios.php?erro=vazio&campo=Nome&codigo=$codigo");
    exit;
}

if ($senha == "") {
    header("Location: alterarusuarios.php?erro=vazio&campo=Senha&codigo=$codigo");
    exit;
}

if ($email == "") {
    header("Location: alterarusuarios.php?erro=vazio&campo=Email&codigo=$codigo");
    exit;
}

if ($senha != $senha2) {
    header("Location: alterarusuarios.php?erro=senha&campo=Senha&codigo=$codigo");
    exit;
}

if (UsuarioDAO::atualizar($nome, $email, $senha, $codigo)) {
    echo "<div class=\"alert alert-success\">Usuário alterado!</div>";
    header("Refresh: 1; URL=cadusuario.php");
} else {
    echo "Erro ao gravar usuário!";
}

rodape();
?>