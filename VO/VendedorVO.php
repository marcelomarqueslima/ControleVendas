<?php


class VendedorVO {
    private $EmailVendedor;
    private $Senha;
    
    public function setEmailVendedor($p) {
        $this->EmailVendedor = trim($p);
    }
    public function getEmailVendedor() {
        return $this->EmailVendedor;
    }
    public function setSenha($p) {
        $this->Senha = trim($p);
    }
    public function getSenha() {
        return $this->Senha;
    }
}
