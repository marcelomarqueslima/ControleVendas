<?php

class VendasVO {

    public $CodVendedor;
    public $CodCliente;
    public $CodVeiculo;
    public $FormaPgto;
    public $Descricao;
    public $dataVenda;
   


    public function setCodVendedor($p) {
        $this->CodVendedor = $p;
    }
    public function getCodVendedor() {
        return $this->CodVendedor;
    }
    public function setCodCliente($p) {
        $this->CodCliente = $p;
    }
    public function getCodCliente() {
        return $this->CodCliente;
    }
    public function setCodVeiculo($p) {
        $this->CodVeiculo = $p;
    }
    public function getCodVeiculo() {
        return $this->CodVeiculo;
    }
    public function setDescricao($p) {
        $this->Descricao = trim($p);
    }
    public function getDescricao() {
        return $this->Descricao;
    }
    public function setFormaPgto($p) {
        $this->FormaPgto = $p;
    }
    public function getFormaPgto() {
        return $this->FormaPgto;
    }
    public function setdataVenda($p) {
        $this->dataVenda = explode('/', $p)[2] . '-' . explode('/', $p)[1] . '-' . explode('/', $p)[0];
    }
    public function getdataVenda() {
        return $this->dataVenda;
    }
}
