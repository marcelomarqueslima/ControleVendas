<?php

class UtilCTRL {
    private static function IniciarSessao() {
        if(!isset($_SESSION)){
        session_start();
        }
    }
    public static function GuardarCodigo($cod){
    self::IniciarSessao();
    $_SESSION['cod'] = $cod;
    }
    public static function CodigoLogado(){
        self::IniciarSessao();
        
        return $_SESSION['cod'];
    }
    public static function Deslogar(){
        self::IniciarSessao();
        unset($_SESSION['cod']);
        header('location: login.php');
    }
    public static function VerLogado(){
        self::IniciarSessao();
        
        if(!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            header('location: login.php');
        }
    }
    public static function TirarCaracteresEspeciais($str) {
        $especiais = array('_', '(', ')', '-', 'R$', ' ', '.', '%', '#', '*', '!', '?', '/');
        $str = str_replace($especiais, '', $str);

        return $str;
    }

    
}
