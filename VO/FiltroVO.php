<?php

class FiltroVO {

    private $CodLogado;
    private $CodModelo;
    private $DtInicial;
    private $DtFinal;

    public function setCodLogado($p) {
        $this->CodLogado = $p;
    }

    public function getCodLogado() {
        return $this->CodLogado;
    }

    public function setCodModelo($p) {
        $this->CodModelo = $p;
    }

    public function getCodModelo() {
        return $this->CodModelo;
    }

    public function setDtInicial($p) {
        $this->DtInicial = $this->DataParaBanco($p);
    }

    public function getDtInicial() {
        return $this->DtInicial;
    }

    public function setDtFinal($p) {
        $this->DtFinal = $this->DataParaBanco($p);
    }

    public function getDtFinal() {
        return $this->DtFinal;
    }

    public function DataParaBanco($p) {
        if (isset(explode('-', $p)[0])) {
            return $p;
        } else {

            return explode('/', $p)[2] . '-' . explode('/', $p)[1] . '-' . explode('/', $p)[0];
        }
    }

}
