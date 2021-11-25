<?php
namespace Models;

class Plano implements Idados{

	protected $id_plano;
	protected $nm_plano;
	protected $vl_plano;

	public function __construct($id_plano,$nm_plano,$vl_plano){
		$this->id_plano=$id_plano;
		$this->nm_plano=$nm_plano;
		$this->vl_plano=$vl_plano;
	}

	public function toString(){
		return $this->id_plano.' '.$this->nm_plano.' '.$this->vl_plano;
	}

	public function toJson() {
		return json_encode($this->toArray());
	}

	public function toArray () {
		return ['id'=>$this->ID,'nome'=>$this->NOME,'detalhe'=>$this->NUM_VIAGEM];
	}

	use trait__get;
}