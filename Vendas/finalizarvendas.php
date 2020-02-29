<?php
require_once '../Controller/VendaCTRL.php';
require_once '../Controller/ClienteCTRL.php';
require_once '../VO/VendedorVO.php';

if(isset($_GET['cod']) && $_GET['cod'] != '' && is_numeric($_GET['cod'])) {
    $cod_veiculo = $_GET['cod'];
    
    $ctrl = new VendasCTRL();
    $ctrl_c = new ClienteCtrl();
    
    $dados = $ctrl->DetalheVeiculo($cod_veiculo);
    
    
    if(count($dados) == 0) {
        header('location: consultarveiculo.php');
    }
    else{
        $clientes = $ctrl_c->ConsultarCliente();
    }
} 
else if(isset($_POST['btnFinalizar'])){
    $vo = new VendasVO();
    $ctrl = new VendasCTRL();
    
    $vo->setCodCliente($_POST['cliente']);
    $vo->setCodVeiculo($_POST['cod']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setFormaPgto($_POST['formapgto']);
    
    $ret = $ctrl->FinalizarVendas($vo);
    
    header("location: consultarveiculo.php?ret=$ret");
}

else {
    header('location: consultarveiculo.php');
}


?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include '_head.php';
        ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include '_topo.php';
            include '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Finalizar Vendas</h2>   
                            <h5>Finaliza sua venda escolhendo o cliente. </h5>

                        </div>
                    </div>

                    <hr />
                    <center><h3>Dados do Veículo </h3></center>
                    <div class="col-md-6">
                        

                            <div class="form-group">
                                <label>Placa</label>
                                <input class="form-control" disabled value="<?= $dados[0]['placa_veiculo']?>"/>
                            </div>
                            <div class="form-group">
                                <label>Marca</label>
                                <input class="form-control" disabled value="<?= $dados[0]['nome_marca']?>"/>
                            </div>
                            <div class="form-group">
                                <label>Modelo</label>
                                <input class="form-control" disabled value="<?= $dados[0]['nome_modelo']?>"/>
                            </div>
                            <div class="form-group">
                                <label>Ano Fabricação</label>
                                <input class="form-control" disabled value="<?= $dados[0]['anofab_veiculo']?>"/>
                            </div>
                            <div class="form-group">
                                <label>Ano Carro</label>
                                <input class="form-control" disabled value="<?= $dados[0]['ano_veiculo']?>"/>
                            </div>
                            <div class="form-group">
                                <label>KM</label>
                                <input class="form-control" disabled value="<?= $dados[0]['km_veiculo']?>"/>
                            </div>
                            <div class="form-group">
                                <label>COR</label>
                                <input class="form-control" disabled value="<?= $dados[0]['nome_cor']?>"/>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Numero de Portas</label>
                            <input class="form-control" disabled value="<?= $dados[0]['porta_veiculo'] == 0 ? '2 Portas' : '4 POrtas'?>"/>
                        </div>
                        <div class="form-group">
                            <label>Direção</label>
                            <input class="form-control" placeholder="Digite aqui!" disabled value="<?= $dados[0]['direcao_veiculo'] == 0 ? 'Manual' : ($dados[8]['direcao_veiculo'] == 1 ? 'Hidraulica' : 'Eletrica')?>"
                        <div class="form-group">
                            <label>ArBaig</label>
                            <input class="form-control" disabled value="<?= $dados[0]['airbag_veiculo'] * 2 == 0 ? 'Nenhum' : $dados[0]['airbag_veiculo'] * 2?>"/>
                        </div>
                        <div class="form-group">
                            <label>Ar Condicionado</label>
                            <input class="form-control" disabled value="<?= $dados[0]['ar_veiculo'] == 0 ? 'Sim' : 'Não'?>"/>
                        </div>
                        <div class="form-group">
                            <label>Freio ABS</label>
                            <input class="form-control" disabled value="<?= $dados[0]['abs_veiculo'] == 0 ? 'Sim' : 'Não'?>"/>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input class="form-control" disabled value="<?= $dados[0]['venda_veiculo']?>"/>
                        </div>
                        <div class="form-group">
                            <label>Observação</label>
                            <input class="form-control" disabled value="<?= $dados[0]['obs_veiculo']?>"/>
                        </div>
                    </div>
                    <hr>
                        <br>
                            <center><h3>Finaliza a venda </h3></center>
                            <br>
                                <form method="POST" action="finalizarvendas.php">
                                    <input type="hidden" name="cod" value="<?= $dados[0]['id_veiculo'] ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Escolha o cliente</label>
                                        <select class="form-control" name="cliente" id="cliente">
                                            <option value="" id="cliente">Selecione</option>
                                            <?php for($i=0; $i<count($clientes); $i++){ ?>
                                                <option value="<?= $clientes[$i]['id_cliente']?>" id="cliente"><?= $clientes[$i]['nome_cliente'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label id="val_cliente" class="validar"></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Forma de Pagamento</label>
                                        <select class="form-control" id="formapgto" name="formapgto">
                                            <option value="">Selecione</option>
                                            <option value="1">Dinheiro</option>
                                            <option value="2">Cheque</option>
                                            <option value="">Cartão</option>
                                        </select>
                                        <label id="val_formapgto" class="validar"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Descrição da venda</label>
                                    <textArea class="form-control" id="descricao" name="descricao"></textarea>
                                    <label id="val_observacao" class="validar"></label>

                    </div>
                                    <center><button type="submit" class="btn btn-success" onclick="return Validar(4)" name="btnFinalizar">Finalizar Venda</button></center>
                    </form>
                </div>

            </div>

        </div>



    </body>
</html>


