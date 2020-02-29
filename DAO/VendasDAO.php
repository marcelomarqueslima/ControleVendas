<?php

require_once '../VO/VendasVO.php';
require_once 'Conexao.php';

class VendasDAO extends Conexao {

    public function FinalizarVendas(VendasVO $vo) {
        
        $conexao = parent::getConexao();
        
        $comando = 'Insert into tb_venda (formapgto_venda, descricao_venda, id_vendedor, id_veiculo, id_cliente, data_venda) values (?, ?, ?, ?, ?, ?)';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getFormaPgto());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getCodVendedor());
        $sql->bindValue(4, $vo->getCodVeiculo());
        $sql->bindValue(5, $vo->getCodCliente());
        $sql->bindValue(6, $vo->getdataVenda());
        
        try {
            $conexao->beginTransaction();
            
            
            $sql->execute();
            
            $comando = 'update tb_veiculo set situacao_veiculo = 2 where id_veiculo = ?';
            
            $sql = $conexao->prepare($comando);
            
            $sql->bindValue(1,$vo->getCodVeiculo());
            
            $sql->execute();
            
            $conexao->commit();
            
            return 1;
            
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }
    public function ConsultarModelos($Cod_Empresa){
        $conexao = parent::getConexao();
        $comando = 'select id_modelo, nome_modelo from tb_modelo where id_empresa=?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $Cod_Empresa);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        return $sql->fetchAll();
    }
    public function FiltrarVeiculo($Cod_Modelo)
    {
        $conexao = parent::getConexao();
        $comando = 'select m.nome_modelo, ma.nome_marca, v.venda_veiculo, v.id_veiculo '
                . 'from tb_veiculo AS V '
                . ' inner join tb_modelo AS m'
                . ' on v.id_modelo = m.id_modelo '
                . ' inner join tb_marca as ma on m.id_marca = ma.id_marca '
                . 'where v.id_modelo = ? AND v.situacao_veiculo = 1';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $Cod_Modelo);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
        
    }
    public function DetalheVeiculo($cod_veiculo, $cod_empresa){
        $conexao = parent::getConexao();
        
        $comando = 'select m.nome_modelo, ma.nome_marca, v.venda_veiculo, v.id_veiculo,'
                . ' v.placa_veiculo, v.anofab_veiculo, v.ano_veiculo, v.km_veiculo, v.porta_veiculo, v.airbag_veiculo,'
                . ' v.direcao_veiculo, v.ar_veiculo, v.abs_veiculo, v.obs_veiculo, c.nome_cor '
                . ' from tb_veiculo AS V '
                . ' inner join tb_modelo AS m'
                . ' on v.id_modelo = m.id_modelo '
                . ' inner join tb_marca as ma on m.id_marca = ma.id_marca '
                . ' inner join tb_cor as c'
                . ' on v.id_cor = c.id_cor'
                . ' where v.id_veiculo = ? AND v.id_empresa =? AND v.situacao_veiculo = 1';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $cod_veiculo);
        $sql->bindValue(2, $cod_empresa);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    public function MinhasVendas(FiltroVO $vo){
        $conexao = parent::getConexao();
        $comando = 'select v.data_venda, ma.nome_marca, mo.nome_modelo, cli.nome_cliente, vei.venda_veiculo '
                . 'from tb_venda as v inner join tb_veiculo as vei ON v.id_veiculo = vei.id_veiculo '
                . ' inner join tb_cliente AS cli on cli.id_cliente = v.id_cliente'
                . ' inner join tb_modelo as mo ON mo.id_modelo = vei.id_modelo '
                . 'inner join tb_marca AS ma ON ma.id_marca = mo.id_marca'
                . ' WHERE v.id_vendedor = ? AND v.data_venda between ? AND ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getCodLogado());
        $sql->bindValue(2, $vo->getDtInicial());
        $sql->bindValue(3, $vo->getDtFinal());
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        return $sql->fetchAll();
                
    }
    public function ValidarLogin($email, $senha)
    {
        
      
        $conexao = parent::getConexao();
        $comando = 'select id_vendedor from tb_vendedor where email_vendedor = ? and senha_vendedor = ? and status_vendedor = 1';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
         $sql->execute();
        return $sql->fetchAll();
    }
    
}
