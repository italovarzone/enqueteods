<?php
function cabecalho()
{

    echo "<!doctype html>
<html lang=\"pt-br\">

<head>
<meta charset=\"UTF-8\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />
<title>Enquete ODS</title>
<link href=\"bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
<script src=\"js/jquery.min.js\"></script>
<script src=\"bootstrap/js/bootstrap.min.js\"></script>
<link type=\"text/css\" rel=\"stylesheet\"href=\"estilo.css\">
</head>

<body>
<div class=\"container\">
<div class=\"principal\">
<div class=\"cabecalho\">
<div class=\"titulo\">
<img src=\"../img/ods.png\" class=\"img-rounded\" alt=\"Ods\"width=\"200\" height=\"100\">
</div>

</div>
<div class=\"centro\">";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['email']) == "") {
        menu();
    } else {
        menuAdmin();
    }
}


function menu()
{
    echo "<a href=\"index.php\">
    <span class=\"glyphicon glyphicon-home\">
    </span> Início
    </a> |
    <a href=\"login.php\">
    <span class=\"glyphicon glyphicon-user\"></span> Login
    </a>";

}
function menuAdmin()
{
    echo "<a href=\"index.php\">
    <span class=\"glyphicon glyphicon-home\">
    </span> Início
    </a> |
    <a href=\"consultaenquete.php\">
    <span class=\"glyphicon glyphicon-list-alt\">
    </span> Consulta Enquete
    </a> |
    <a href=\"consultaenquete_detalhe.php\">
    <span class=\"glyphicon glyphicon-list-alt\">
    </span> Consulta Totais
    </a> |
    <a href=\"cadusuario.php\">
    <span class=\"glyphicon glyphicon-list-alt\">
    </span> Cadastro de Usuários
    </a> |
    <a href=\"login.php\">
    <span class=\"glyphicon glyphicon-user\"></span> Login
    </a> |
    <a href=\"logout.php\">
    <span class=\"glyphicon glyphicon-off\"></span> Sair
    </a> | ";

}

function data($data)
{
    return date("d/m/Y", strtotime($data));
}

function rodape()
{
    echo "</div>
    <div class=\"rodape\">" . date("Y") . " - Sistemas de Informação</div>
    </div></div>
    </body>
    </html>";
}

function verificacampo($campo, $valor)
{
    if ($valor == "") {
        echo "<div class=\"alert alert-danger\">
            Atenção, campo <b>$campo</b> em branco!</div>";
        header("Refresh: 1; URL=../index.php");
        rodape();
        exit;
    }
}

function acesso()
{

    //session_destroy();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['email']) == "") {
        header("Location: ../controller/login.php");
        echo "<div class=\"alert alert-danger\">
        Atenção, <b>Área restrita!</b> Apenas administradores podem acessar essa página!</div>";
        exit;
    }
}
function logout()
{
    session_start();
    session_destroy();
    header("Location: ../controller/index.php");
}

?>