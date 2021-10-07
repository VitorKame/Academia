class Instrutor {

    protected $InstrutorId;
    protected $NomeInstrutor;
    protected $EspecialidadeInstrutor;
    protected $PeriodoInstrutor;

    public function_construct($InstrutorId, $NomeInstrutor, $EspecialidadeInstrutor, $PeriodoInstrutor){
        $this->InstrutorId=$InstrutorId;
        $this->NomeInstrutor=$NomeInstrutor;
        $this->EspecialidadeInstrutor=$EspecialidadeInstrutor;
        $this->PeriodoInstrutor=$PeriodoInstrutor;
    }

}