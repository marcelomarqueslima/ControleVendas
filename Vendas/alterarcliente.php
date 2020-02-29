<?php
require_once '../Controller/ClienteCtrl.php';
require_once './_msg.php';
require_once '../VO/ClienteVO.php';

if (isset($_GET['cod']) && $_GET['cod'] != '' && is_numeric($_GET['cod'])) {

    if (isset($_GET['ret'])) {
        $ret = $_GET['ret'];
    }


    $cod = $_GET['cod'];
    $ctrl = new ClienteCtrl();
    $cliente = $ctrl->FiltrarCliente($cod);

    if (count($cliente) == 0) {
        header('location: consultarcliente.php');
    }
} elseif (isset($_POST['btnSalvar'])) {
    $vo = new ClienteVO();
    $ctrl = new ClienteCtrl();
    $cod = $_POST['cod'];

    $vo->setCodigoCliente($_POST['cod']);
    $vo->setEmail($_POST['email']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setNomecliente($_POST['nome']);
    $vo->setTelefone($_POST['telefone']);

    $ret = $ctrl->AlterarCliente($vo);

    header("location: alterarcliente.php?cod=$cod&ret=$ret");
} else {
    header('location: consultarcliente.php');
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
            if (isset($ret)) {

                ExibirMsg($ret);
            }
            ?>
                            <h2>Alterar Cliente</h2>   
                            <h5>Altere seus cliente aqui. </h5>

                        </div>
                    </div>

                    <hr />
                    <form method="post" action="alterarcliente.php">
                        <input type="hidden" name="cod" value="<?= $cliente[0]['id_cliente'] ?>">

                            <div class="form-group">
                                <label>Nome do Cliente</label>
                                <input class="form-control" placeholder="Digite aqui!" id="nome" name="nome" value="<?= $cliente[0]['nome_cliente'] ?>" />
                                <label id="val_cliente" class="validar"></label>
                            </div>
                            <div class="form-group">
                                <label>Email do Cliente</label>
                                <input class="form-control" placeholder="Digite aqui!" id="email" name="email" value="<?= $cliente[0]['email_cliente'] ?>" />
                                <label id="val_email" class="validar"></label>
                            </div>
                            <div class="form-group">
                                <label>Telefone do Cliente</label>
                                <input class="form-control tel num telpree" placeholder="Digite aqui!" id="telefone" name="telefone" value="<?= $cliente[0]['tel_cliente'] ?>" />
                                <label id="val_telefone" class="validar"></label>
                            </div>
                            <div class="form-group">
                                <label>Endereço do Cliente</label>
                                <input class="form-control" placeholder="Digite aqui!" id="endereco" name="endereco" value="<?= $cliente[0]['endereco_cliente'] ?>" />
                                <label id="val_endereco" class="validar"></label>
                            </div>
                            <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(3)">Salvar</button>
                    </form>
                </div>

            </div>

        </div>



    </body>
</html>

