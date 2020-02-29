<?php
require_once '../Controller/ClienteCtrl.php';

$ctrl = new ClienteCtrl();
$dados = $ctrl->ConsultarCliente();



?>﻿
<!DOCTYPE html>
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
                            <h2>Consultar / Alterar Cliente</h2>   
                            <h5>Para alteração, clique no botão <b>Alterar</b> </h5>

                        </div>
                    </div>

                    <hr />





                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Clientes Cadastrados
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Telefone</th>
                                                    <th>Endereço</th>
                                                    <th>Açao</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0; $i<count($dados); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $dados[$i]['nome_cliente']?></td>
                                                    <td><?= $dados[$i]['email_cliente']?></td>
                                                    <td><?= $dados[$i]['tel_cliente']?></td>
                                                    <td><?= $dados[$i]['endereco_cliente']?></td>
                                                    <td><a href="alterarcliente.php?cod=<?= $dados[$i]['id_cliente'] ?>" type="submit" class="btn btn-warning">Alterar</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </body>
</html>

