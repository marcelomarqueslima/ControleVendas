<?php
require_once '../Controller/VendaCTRL.php';
require_once '../VO/FiltroVO.php';
include_once './_msg.php';

$dtinicial = '';
$dtfinal = '';

if(isset($_POST['btnPesquisar'])) {
    $vo =  new FiltroVO();
    $ctrl = new VendasCTRL();
    
    $dtinicial = $_POST['dtincial'];
    $dtfinal = $_POST['dtfinal'];
  
    $vo->setDtInicial($_POST['dtincial']);
    $vo->setDtFinal($_POST['dtfinal']);
    
    $vendas = $ctrl->MinhasVendas($vo);
}

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
                            <h2>Minhas vendas</h2>
                        </div>
                    </div>

                    <hr />
                    <form method="post" action="minhasvendas.php"> 
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Data Inicial</label>
                            <input class="form-control" type="date"  id="dtinicial" name="dtincial" value="<?= $dtinicial ?>"/>
                            <label id="val_dtinicial" class="validar"></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Data Final</label>
                            <input class="form-control" type="date" id="dtfinal" name="dtfinal" value="<?= $dtfinal ?>"/>
                            <label id="val_dtfinal" class="validar"></label>
                        </div>
                    </div>
                   
                    <center><button type="submit" class="btn btn-info" name="btnPesquisar" onclick="return Validar(5)">Pesquisar</button></center>
                    </form>
                    <hr />
                    
                    <?php if(isset($vendas)){?>
                        <?php if(count($vendas)>0) {?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Resultado
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                     <th>Data</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Cliente</th>
                                                    <th>Valor</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0; $i<count($vendas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $vendas[$i]['data_venda']?></td>
                                                    <td><?= $vendas[$i]['nome_marca']?></td>
                                                    <td><?= $vendas[$i]['nome_modelo']?></td>
                                                    <td><?= $vendas[$i]['nome_cliente']?></td>
                                                    <td><?= $vendas[$i]['venda_veiculo']?></td>
                                                  
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
                    <?php } else {
                     ExibirMsg(2);
 
                    }?>
                    
                    <?php } ?>
                </div>

            </div>

        </div>



    </body>
</html>