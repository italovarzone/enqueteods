<?php

class Enquete {
  private $sugestao;
  private $nome;
  private $data;
  private $pdo;

  public function __construct($sugestao, $nome) {
      $this->setSugestao($sugestao);
      $this->setNome($nome);
      $this->setData(date('Y-m-d H:i:s'));
      $this->pdo = Config::getPDO();
  }

  public function getSugestao() {
      return $this->sugestao;
  }

  public function setSugestao($sugestao) {
      $this->sugestao = $sugestao;
  }

  public function getNome() {
      return $this->nome;
  }

  public function setNome($nome) {
      $this->nome = $nome;
  }

  public function getData() {
      return $this->data;
  }

  public function setData($data) {
      $this->data = $data;
  }
}
?>