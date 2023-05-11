<?php
require "../config.php";
require "../view/funcoes.php";
require "../model/Usuario.php";
require "../model/UsuarioDAO.php";

cabecalho("Cadastro de usuários");

acesso();

@$erro=$_GET['erro'];
@$campo=$_GET['campo'];

@$nome=$_GET['nome'];
@$email= $_GET['email'];

if ($erro=="vazio"){
	echo "<div class=\"alert alert-danger\">
	Atenção, campo <b>$campo</b> em branco!</div>";
}

if ($erro=="senha"){
	echo "<div class=\"alert alert-danger\">
	Atenção, campo <b>$campo</b> diferente!</div>";
}

if ($erro=="email"){
	echo "<div class=\"alert alert-danger\">
	Atenção, <b>$campo</b> já está cadastrado!</div>";
}

if ($erro=="errada"){
	echo "<div class=\"alert alert-danger\">
	Atenção, <b>$campo</b> está divergente!</div>";
}
?>

<form name="form1" method="post" action="gravausuario.php">
<p>Nome:
 <input type="text" size="50" value="<?php echo $nome ?>" autofocus name="nome" id="nome" 
 class="form-control"/>
 </p>
 
 <p>Email:
 <input type="email" size="50" value="<?php echo $email ?>" name="email" id="email" class="form-control" />
 </p>
 
 <p>Senha:
 <input type="password" size="50"  name="senha" id="senha" class="form-control"/>
 </p>
 
 <p>Confirmar Senha:
 <input type="password" size="50"  name="senha2" id="senha2" class="form-control"/>
 </p>
 
 <p>
    <input type="submit" value="Gravar" class="btn btn-primary"/>
	<input type="reset" value="Limpar"  class="btn btn-primary"/>
	
 </p>
</form> 

<?php
$usuarios = UsuarioDAO::listar();

echo "<table width=\"100%\" border class=\"table table-hover\">
      <tr>
	  <td>Código</td>
	  <td>Nome</td>
	  <td>Email</td>
	  <td>Opções</td>
</tr>";

foreach ($usuarios as $usuario) {
    echo "<tr>
    <td>{$usuario->codigo()}</td>
    <td>{$usuario->getNome()}</td>
    <td>{$usuario->getEmail()}</td>
    
    <td>
    <a href=\"alterarusuarios.php?codigo={$usuario->codigo()}\" class=\"btn btn-success btn-xs\">Alterar</a>
    
    <a href=\"excluirusuarios.php?codigo={$usuario->codigo()}\" class=\"btn btn-danger btn-xs\" onclick=\"return confirm('Confirmar exclusão do Registro?')\">Excluir</a>
    </td>
    
    </tr>";
}

echo"</table>";

rodape();
?>