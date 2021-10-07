<?php

class Modalidades implements Instrutores{

    protected $ModalidadeId;
    protected $NomeModalidade;

    public function_construct($ModalidadeId, $NomeModalidade){
        $this->ModalidadeId=$ModalidadeId;
        $this->NomeModalidade=$NomeModalidade;
    }

}

?>