<?php
/*gravausuario.php*/
require "../config.php";
require "../view/funcoes.php";
require "../model/Usuario.php";
require "../model/UsuarioDAO.php";

cabecalho("Enquete de ODS");

$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$senha2=$_POST['senha2'];

$usuario = new Usuario($nome, $email, $senha, 0);

if($nome==""){
    header("location: cadusuario.php?erro=vazio&campo=nome");
    exit;
}

if($email==""){
    header("location: cadusuario.php?erro=vazio&campo=email");
    exit;
}

if($senha==""){
    header("location: cadusuario.php?erro=vazio&campo=senha");
    exit;
}

// Verifica se o e-mail já está cadastrado
if (UsuarioDAO::contarPorEmail($email) > 0) {
    header("location: cadusuario.php?erro=email&campo=email");
    exit;
}

if($senha<>$senha2){
    header("location: cadusuario.php?erro=errada&campo=senha");
    exit;
}

if (UsuarioDAO::inserir($nome, $email, $senha)) {
    echo "<div class=\"alert alert-success\">
        Obrigado pelo Cadastro!
    </div>";
    header("Refresh: 1; URL=index.php");
}else{
    echo "<h1>Erro ao Cadastrar </h1>";
}

rodape();
?>