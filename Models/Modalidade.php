<?php
namespace Models;

class Modalidade implements Idados{
	
	protected $id_modalidade;
	protected $nm_modalidade;
	protected $qt_aulas_modalidade;
	
	public function __construct($id_modalidade,$nm_modalidade,$qt_aulas_modalidade){
		$this->id_modalidade=$id_modalidade;
		$this->nm_modalidade=$nm_modalidade;
		$this->qt_aulas_modalidade=$qt_aulas_modalidade;
	}
	
	public function toString(){
		return $this->id_modalidade.' '.$this->nm_modalidade.' '.$this->qt_aulas_modalidade;
	}

	public function toJson() {
		return json_encode(['id_modalidade'=>$this->id_modalidade,'nm_modalidade'=>$this->nm_modalidade,'qt_aulas_modalidade'=>$this->qt_aulas_modalidade]);
	}

	public static function toJsonEstatico ($id_modalidade,$nm_modalidade,$qt_aulas_modalidade) {
		return json_encode(['id_modalidade'=>$id_modalidade,'nm_modalidade'=>$nm_modalidade,'qt_aulas_modalidade'=>$qt_aulas_modalidade]);
	}

	use trait__get;
}