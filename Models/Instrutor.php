<?php

namespace Models;

class Instrutor {

    private $instrutorId;
    private $nomeInstrutor;
    private $especialidadeInstrutor;
    private $periodoInstrutor;

    public function_construct($instrutorId, $nomeInstrutor, $especialidadeInstrutor, $periodoInstrutor){
        $this->instrutorId = $instrutorId;
        $this->nomeInstrutor = $nomeInstrutor;
        $this->especialidadeInstrutor = $especialidadeInstrutor;
        $this->periodoInstrutor = $periodoInstrutor;
    }

}

?>