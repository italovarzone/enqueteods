<?php

class Usuario {
    private $codigo;
    private $nome;
    private $email;
    private $senha;

    public function __construct(string $nome, string $email, string $senha, int $codigo) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->codigo = $codigo;
    }

    public function codigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }
}

?>