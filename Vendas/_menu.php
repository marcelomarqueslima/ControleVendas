<?php

require_once '../Controller/UtilCTRL.php';

if(isset($_GET['close']) && $_GET['close'] == 1){
    UtilCTRL::Deslogar();
}

?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          
            <li>
                <a  href="novocliente.php"><i class="fa fa-user fa-3x"></i> Novo cliente</a>
            </li>
            <li>
                <a  href="consultarcliente.php"><i class="fa fa-edit fa-3x"></i> Consultar / Alterar cliente</a>
            </li>
            <li>
                <a  href="consultarveiculo.php"><i class="fa fa-check fa-3x"></i> Fechar venda</a>
            </li>
             <li>
                 <a  href="minhasvendas.php"><i class="fa fa-search fa-3x"></i> Minhas vendas</a>
            </li>
            <li>
                <a  href="_menu.php?close=1"><i class="fa fa-close fa-3x"></i> Sair</a>
            </li>	
        
        </ul>

    </div>

</nav>  