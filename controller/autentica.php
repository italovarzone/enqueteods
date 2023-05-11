<?php
#autentica.php

require "../view/funcoes.php";
require "../config.php";
require_once ("../model/UsuarioDAO.php");

cabecalho("Login de Usuário");

$email = $_POST['email'];
$senha = $_POST['senha'];

if ($email == "") {
    header("Location: login.php?erro=vazio&campo=Email");
    exit;
}

if ($senha == "") {
    header("Location: login.php?erro=vazio&campo=Senha&email=$email");
    exit;
}

$row = UsuarioDAO::autenticar($email, $senha);

if ($row) {
    session_start();
    $_SESSION['codigo'] = $row['codigo'];
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['email'] = $row['email'];
    header("Location: cadusuario.php");
} else {
    header("Location: login.php?erro=invalido&campo=Senha");
    exit;
}

rodape();
?>