<?php

function ExibirMsg($ret) {
    
    switch ($ret) {
        case -1:
            echo '<div class="alert alert-danger">Ocoreu um erro na operação!</div>';
            break;

        case 0:
            echo '<div class="alert alert-warnig">Preencher o(s) Campo(s)!</div>';
            break;

        case 1:
            echo '<div class="alert alert-success">Dados gravados com sucesso!</div>';
            break;
        case 2:
            echo '<div class="alert alert-info">Não existe nenhuma informações a ser exibida!</div>';
            break;
        case 3:
            echo '<div class="alert alert-info">Usuário não encontrado!</div>';
            break;
    }
}
