<?php
require "../view/funcoes.php";
require "../config.php";
require "../model/Usuario.php";
require "../model/UsuarioDAO.php";

acesso();
cabecalho("Cadastro de Usuários");

$codigo = $_GET['codigo'];

$row = UsuarioDAO::buscarPorCodigo($codigo);

if (!$row) {
    echo "<div class=\"alert alert-danger\">
        Usuário não encontrado
    </div>";
    header("Refresh: 1; URL=cadusuario.php");
    exit;
}

$nome = $row->getNome();
$email = $row->getEmail();

$erro = @$_GET['erro'];
$campo = @$_GET['campo'];

if ($erro == "senha") {
    echo "<div class=\"alert alert-danger\">
        Atenção, campo <b>$campo</b> diferente!
    </div>";
}

echo "<form name=\"form1\" method=\"post\" action=\"gravaaltusuarios.php\">
    <input type=\"hidden\" name=\"codigo\" value=\"$codigo\">
    <p>Nome:
        <input type=\"text\" size=\"50\" value=\"$nome\" required autofocus name=\"nome\" id=\"nome\" class=\"form-control\">
    </p>
    <p>Email:
        <input type=\"email\" size=\"50\" value=\"$email\" required name=\"email\" id=\"email\" class=\"form-control\">
    </p>
    <p>Senha:
        <input type=\"password\" size=\"50\" required name=\"senha\" id=\"senha\" class=\"form-control\">
    </p>
    <p>Confirma Senha:
        <input type=\"password\" size=\"50\" required name=\"senha2\" id=\"senha2\" class=\"form-control\">
    </p>
    <p>
        <input type=\"submit\" value=\"Gravar\" class=\"btn btn-primary\">
        <input type=\"reset\" value=\"Limpar\" class=\"btn btn-primary\">
    </p>
</form>";

rodape();
?>