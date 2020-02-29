<?php

class ClienteVO {
    private $CodCliente;
    private $NomeCliente;
    private $email;
    private $telefone;
    private $endereco;
    private $codVendedor;
    
    public function setCodigoCliente($p) {
        $this->CodCliente = $p;
    }
    public function getCodigoCliente() {
        return $this->CodCliente;
    }
    public function setNomecliente($p) {
        $this->NomeCliente = trim($p);
    }
    public function getNomecliente() {
        return $this->NomeCliente;
    }
    public function setEmail($p) {
        $this->email = trim($p);
    }
    public function getEmail() {
        return $this->email;
    }
    public function setTelefone($p) {
        $this->telefone = trim($p);
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setEndereco($p) {
        $this->endereco = trim($p);
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setCodVendedor($p) {
        $this->codVendedor = ($p);
    }
    public function getCodVendedor() {
        return $this->codVendedor;
    }
}
