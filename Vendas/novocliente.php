<?php
require_once '../Controller/ClienteCtrl.php';
require_once '../VO/ClienteVO.php';
include_once './_msg.php';

if(isset($_POST['btnsalvar'])) {
    
    $vo = new ClienteVO();
    $ctrl = new ClienteCtrl();
    
    $vo->setEmail($_POST['email']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setNomecliente($_POST['nome']);
    $vo->setTelefone($_POST['telefone']);
    
    $ret = $ctrl->InserirCliente($vo);
    
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
                            <?php
                            if(isset($ret)) {
                                
                                ExibirMsg($ret);
                            }                            
                            ?>
                            <h2>Novo Cliente</h2>   
                            <h5>Cadastre seus cliente aqui. </h5>

                        </div>
                    </div>

                    <hr />
                    <form method="post" action="novocliente.php">
                        <div class="form-group">
                            <label>Nome do Cliente</label>
                            <input class="form-control" placeholder="Digite aqui!" id="cliente" name="nome"/>
                            <label id="val_cliente" class="validar"></label>
                        </div>
                        <div class="form-group">
                            <label>Email do Cliente</label>
                            <input class="form-control" placeholder="Digite aqui!" id="email" name="email"/>
                            <label id="val_email" class="validar"></label>
                        </div>
                        <div class="form-group">
                            <label>Telefone do Cliente</label>
                            <input class="form-control tel num telpree" placeholder="(xx) xxxxx-xxxx" id="telefone" name="telefone"/>
                            <label id="val_telefone" class="validar"></label>
                        </div>
                        <div class="form-group">
                            <label>Endereço do Cliente</label>
                            <input class="form-control" placeholder="Digite aqui!" id="endereco" name="endereco"/>
                            <label id="val_endereco" class="validar"></label>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnsalvar" onclick="return Validar(3)">Salvar</button>
                </div>
                </form>
            </div>

        </div>
    </body>
</html>
