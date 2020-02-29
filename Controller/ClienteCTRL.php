<?php

require_once '../DAO/ClienteDAO.php';
require_once '../VO/ClienteVO.php';
require_once 'UtilCTRL.php';

class ClienteCtrl {
    
    public function InserirCliente(ClienteVO $vo) {
        
        if($vo->getEmail() == '' || $vo->getEndereco() == '' || $vo->getNomecliente() == '' || $vo->getTelefone() == '') {
            return 0;
        }
        $vo->setTelefone(UtilCTRL::TirarCaracteresEspeciais($vo->getTelefone()));
        $vo->setCodVendedor(UtilCTRL::CodigoLogado());
        $dao = new ClienteDAO();
        
        return $dao->InserirCliente($vo);
    }
    public function AlterarCliente(ClienteVO $vo) {
        
        if($vo->getEmail() == '' || $vo->getEndereco() == '' || $vo->getNomecliente() == '' || $vo->getTelefone() == '') {
            return 0;
        }
        
       $vo->setTelefone(UtilCTRL::TirarCaracteresEspeciais($vo->getTelefone()));
        $dao = new ClienteDAO();
        
        return $dao->AlterarCliente($vo);
    }
    public function ConsultarCliente () {
        $dao = new ClienteDAO();
        return $dao->ConsultarCliente(UtilCTRL::CodigoLogado());
    }
    public function  FiltrarCliente($cod_cliente) {
        $dao = new ClienteDAO();
        
        return $dao->FiltrarCliente($cod_cliente, UtilCTRL::CodigoLogado());
    }
}
