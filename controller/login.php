<?php
#login.php

require "../view/funcoes.php";
cabecalho("Login");

@$erro=$_GET['erro'];
@$campo=$_GET['campo'];
@$email=$_GET['email'];

if ($erro=="invalido"){
    echo "<script>$(\"#myModal\").modal();</script>";
    echo "<div clas=\"alert alert-danger\">
    Atenção, login ou senha inválidos!</div>";
}

if ($erro=="vazio"){
    echo "<div clas=\"alert alert-danger\">
    Atenção, campo <b>$campo</b> em branco!</div>";
}
?>

<form action="autentica.php" method="post" name="f1" >
    <p>


        <label for="login">Login:</label>
        <input name="email" type="text" value="<?php echo $email ?>" id="email" size="50" maxlenght="50" class="form-control">
    </p>
    <p>

        <label for="senha">Senha:</label>
        <input name="senha" type="password" id="senha" size="50" maxlenght="50" class="form-control">
    </p>
    <p>

        <input type="submit" name="Acessar" id="Acessar" value="Enviar"
        class="btn btn-primary">
        <input type="reset" name="reset" id="reset" value="Limpar"
        class="btn btn-primary">
        </p>
    </form>

    <?php
    rodape();
    ?>
