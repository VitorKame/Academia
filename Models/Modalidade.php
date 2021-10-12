<?php

namespace Models;

class Modalidade {

    private $modalidadeId;
    private $nomeModalidade;
    private $idInstrutor;

    public function_construct($ModalidadeId, $NomeModalidade, $idInstrutor){
        $this->modalidadeId = $modalidadeId;
        $this->nomeModalidade = $nomeModalidade;
        $this->idInstrutor = $idInstrutor;
    }

}

?>