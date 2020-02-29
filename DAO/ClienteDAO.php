<?php

require_once 'Conexao.php';
require_once '../VO/ClienteVO.php';


class ClienteDAO extends Conexao {
    
    public function InserirCliente(ClienteVO $vo) {
        
        //1º Passo: Criar variável para recebe objeto de conexão
        $conexao = parent::getConexao();
        
        //2º Passo: Criar uma variavel para receber instrução SQL que será executada no banco
        
        $comando = 'insert into tb_cliente(nome_cliente, email_cliente, tel_cliente, endereco_cliente, id_vendedor) values(?, ?, ?, ?, ?)';
        
        //3º Passo: Criar variavel que ira recebe um novo objeto que sera parametrizado para executar no banco
        $sql = new PDOStatement();
        
        //4º Passo: Fazer com que a variavel sql receba a conexao, e a conexao se prepara para o comando
        $sql = $conexao->prepare($comando);
        
        //5º Passo: verificar se tem o ponte de interrogação no comando. se sim, cria os bindValues
        $sql->bindValue(1, $vo->getNomecliente());
        $sql->bindValue(2,$vo->getEmail());
        $sql->bindValue(3, $vo->getTelefone());
        $sql->bindValue(4, $vo->getEndereco());
        $sql->bindValue(5, $vo->getCodVendedor());
        
        try {
            //6º Passo: Executar
            
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    
    public function AlterarCliente(ClienteVO $vo) {
        $conexao = parent::getConexao();
        
        $comando = 'UPDATE tb_cliente SET nome_Cliente = ?, email_cliente = ?, tel_cliente = ?, endereco_cliente = ? where id_cliente = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getNomecliente());
        $sql->bindValue(2, $vo->getEmail());
        $sql->bindValue(3, $vo->getTelefone());
        $sql->bindValue(4, $vo->getEndereco());
        $sql->bindValue(5, $vo->getCodigoCliente());
        
        try {
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            return -1;
        }
        
    }
    
    public function ConsultarCliente($cod_logado){
        $conexao = parent::getConexao();
        $comando = 'select id_cliente, nome_cliente, email_cliente, tel_cliente, endereco_cliente from tb_cliente where id_vendedor = ?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $cod_logado);
        
        /*Configura o retorno da consulta para trazer somente a coluna e o valor, eliminando o indice da coluna*/
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        //Retorno toda a pesquisa
        return $sql->fetchAll();
    }
    public function FiltrarCliente($cod_cliente, $Cod_logado) {
        $conexao = parent::getConexao();
        
         $comando = 'select id_cliente, nome_cliente, email_cliente, tel_cliente, endereco_cliente from tb_cliente where id_vendedor = ? AND id_cliente = ?';
         
         $sql = new PDOStatement();
         $sql = $conexao->prepare($comando);
         
         $sql->bindValue(1, $Cod_logado);
         $sql->bindValue(2, $cod_cliente);
         
         $sql->setFetchMode(PDO::FETCH_ASSOC);
         
         $sql->execute();
         
         return $sql->fetchAll();

    }
}
