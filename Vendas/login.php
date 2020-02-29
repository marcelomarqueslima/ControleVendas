
<?php
require_once '../Controller/VendaCTRL.php';
require_once './_msg.php';

if (isset($_POST['btnAcessar'])) {
    $ctrl = new VendasCTRL();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $ret = $ctrl->ValidarLogin($email, $senha);
}
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<?php
include '_head.php'
?>

    </head>
    <body>
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-12">
                    <br /><br />
                    <h2> Controle de Vendas : Vendedor</h2>


                    <br />
                </div>
            </div>
            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>   Entre com seus dados </strong>  
                        </div>

                            <form method="post" action="login.php">
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Insira o Usuário" id="usuario" />
                                </div>
                                <div class="form-group">
                                    <label id="val_email" class="validar"></label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" name="senha" class="form-control"  placeholder="Insira a Senha" id="senha"/>
                                </div>
                                <div class="form-group">
                                    <label id="val_senha" namm class="validar">* Preencher o campo senha!</label>
                                </div>
                                <button class="btn btn-primary" name="btnAcessar" onclick="return Validar(1)">Acessar</button>
                                <hr />

                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </body>
</html>
