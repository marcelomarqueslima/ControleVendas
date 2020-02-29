<?php
require_once '../Controller/VendaCTRL.php';
require_once './_msg.php';

$cod_modelo = '';
$ctrl = new VendasCTRL();

if(isset($_POST['btnPesquisar'])) {
    $cod_modelo = $_POST['modelo'];
    $veiculos = $ctrl->FiltrarVeiculo($cod_modelo);
}



$modelos = $ctrl->ConsultarModelos();



?>
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
                            <?php
                            if(isset($_GET['ret'])){
                                ExibirMsg($_GET['ret']);
                            }
                            ?>
                            <h2>Consulte e finalize suas vendas</h2>   
                            <h5>Para finalizar clique no botão <b>Finalizar</b> </h5>

                        </div>
                    </div>

                    <hr />
                    <form method="POST" action="consultarveiculo.php">
                        <div class="form-group">
                            <label>Escolha o modelo:</label>
                           
                            <select class="form-control" id="modelo" name="modelo">
                                <option value="">Selecione</option>
                                <?php
                                for($i=0; $i<count($modelos); $i++) { ?>
                                <option <?= $cod_modelo == $modelos[$i]['id_modelo'] ? 'selected' : '' ?> value="<?= $modelos[$i]['id_modelo']?>"><?= $modelos[$i]['nome_modelo']?></option>
                                <?php } ?>
                            </select>

                            <label id="val_modelo" class="validar"></label>

                        </div>
                        <center><button a href="consultarveiculo.php" type="submit" class="btn btn-info" onclick="return Validar(2)" name="btnPesquisar">Escolher</button></center>

                   
                    </form>
                    <hr />
                    <?php if(isset($veiculos) && count($veiculos) > 0) {?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Veîculos encontrados
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Modelo</th>
                                                    <th>Marca</th>
                                                    <th>Valor</th>

                                                    <th>Açao</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php for($i=0; $i<count($veiculos); $i++) {?>
                                                <tr class="odd gradeX">
                                                    <td><?= $veiculos[$i]['nome_modelo']?></td>
                                                    <td><?= $veiculos[$i]['nome_marca']?></td>
                                                    <td><?= $veiculos[$i]['venda_veiculo']?></td>

                                                    <td><a href="finalizarvendas.php?cod=<?= $veiculos[$i]['id_veiculo'] ?>" type="submit" class="btn btn-info">Escolher</a></td>
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
                    <?php } else if(isset($veiculos)) {
                        ExibirMsg(2);
                    }?>
                </div>

            </div>

        </div>



    </body>
</html>


