<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'bdenquete');

require_once ("Usuario.php");

class UsuarioDAO{

    public static function inserir($nome, $email, $senha) {
        $pdo = Config::getPDO();
        $codificada = sha1($senha);
        $insert = $pdo->prepare("INSERT INTO usuarios VALUES(:codigo, :nome, :email, :senha)");
        $insert->bindValue(':codigo', 0);
        $insert->bindValue(':nome', $nome);
        $insert->bindValue(':email', $email);
        $insert->bindValue(':senha', $codificada);
        return $insert->execute();
    }
    
    public static function contarPorEmail($email) {
        $pdo = Config::getPDO();
        $select = $pdo->prepare("SELECT COUNT(*) AS count FROM usuarios WHERE email=:email");
        $select->bindParam(':email', $email, PDO::PARAM_STR);
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    public static function autenticar($email, $senha) {
        $pdo = Config::getPDO();
        $senha_codificada = sha1($senha);
        $select = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
        $select->bindParam(':email', $email, PDO::PARAM_STR);
        $select->bindParam(':senha', $senha_codificada, PDO::PARAM_STR);
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function excluir($codigo) {
        $pdo = Config::getPDO();
        $delete = $pdo->prepare("DELETE FROM usuarios WHERE codigo=:codigo");
        $delete->bindValue(':codigo', $codigo);
        return $delete->execute();
    }

    public static function buscarPorCodigo(int $codigo) {
        $pdo = Config::getPDO();
        $consulta = $pdo->prepare("SELECT * FROM usuarios WHERE codigo = ?");
        $consulta->execute([$codigo]);
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
    
        if (!$row) {
            return null;
        }

        $usuario = new Usuario($row['nome'], $row['email'], $row['senha'], $row['codigo']);
    
        return $usuario;
    }

    public static function atualizar($nome, $email, $senha, $codigo) {
        $pdo = Config::getPDO();
        $senha_codificada = sha1($senha);
        $update = $pdo->prepare("UPDATE usuarios SET nome=:nome, email=:email, senha=:senha WHERE codigo=:codigo");
        $update->bindParam(':nome', $nome, PDO::PARAM_STR);
        $update->bindParam(':email', $email, PDO::PARAM_STR);
        $update->bindParam(':senha', $senha_codificada, PDO::PARAM_STR);
        $update->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        return $update->execute();
    }

    public function salvar() {
        $pdo = Config::getPDO();
        $consulta = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $consulta->execute([$this->nome, $this->email, $this->senha]);
    }

    public static function listar() {
        $pdo = Config::getPDO();
        $consulta = $pdo->prepare("SELECT * FROM usuarios ORDER BY nome");
        $consulta->execute();
        $usuarios = [];
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($row['nome'], $row['email'], $row['senha'], $row['codigo']);
        }
        return $usuarios;
    }
}
?>