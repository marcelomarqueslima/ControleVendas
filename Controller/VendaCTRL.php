<?php

require_once '../DAO/VendasDAO.php';
require_once '../VO/VendedorVO.php';
require_once 'UtilCTRL.php';

class VendasCTRL {

    public function FinalizarVendas(VendasVO $vo) {
        if ($vo->getCodCliente() == '' || $vo->getDescricao() == '' || $vo->getFormaPgto() == '') {
            return 0;
        }
        $vo->setCodVendedor(UtilCTRL::CodigoLogado());
        $vo->setdataVenda(date('d/m/y'));
        $dao = new VendasDAO();

        return $dao->FinalizarVendas($vo);
    }

    public function ConsultarModelos() {
        $cod_empresa = UtilCTRL::CodigoLogado();
        $dao = new VendasDAO();
        return $dao->ConsultarModelos($cod_empresa);
    }

    public function FiltrarVeiculo($Cod_Modelo) {
        $dao = new VendasDAO();
        return $dao->FiltrarVeiculo($Cod_Modelo);
    }

    public function DetalheVeiculo($cod_veiculo) {
        $cod_empresa = UtilCTRL::CodigoLogado();
        $dao = new VendasDAO();
        return $dao->DetalheVeiculo($cod_veiculo, $cod_empresa);
    }

    public function MinhasVendas(FiltroVO $vo) {
        if ($vo->getDtInicial() == '' || $vo->getDtFinal() == '') {
            return 0;
        }
        $vo->setCodLogado(UtilCTRL::CodigoLogado());

        $dao = new VendasDAO();

        return $dao->MinhasVendas($vo);
    }

    public function ValidarLogin($email, $senha) {
        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }
        $dao = new VendasDAO();
        $vendedor = $dao->ValidarLogin($email, $senha);

        if (count($vendedor) == 0) {
            return 3;
        } else {
            $cod = $vendedor[0]['id_vendedor'];
            UtilCTRL::GuardarCodigo($cod);
            header('location: minhasvendas.php');
        }
    }

}

?>