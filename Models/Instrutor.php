<?php

namespace Models;

class Instrutor implements Idados
{
	protected $id_instrutor;
	protected $nm_instrutor;
	protected $nm_especialidade_instrutor;
	protected $modalidade_id;

	public function __construct($id_instrutor, $nm_instrutor, $nm_especialidade_instrutor, $modalidade_id)
	{
		$this->id_instrutor = $id_instrutor;
		$this->nm_instrutor = $nm_instrutor;
		$this->nm_especialidade_instrutor = $nm_especialidade_instrutor;
		$this->modalidade_id = $modalidade_id;
	}

	public function toString()
	{
		return $this->id_instrutor . ' ' . $this->nm_instrutor . ' ' . $this->nm_especialidade_instrutor . ' ' . $this->modalidade_id;
	}

	public function toJson()
	{
		return json_encode(['id_instrutor' => $this->id_instrutor, 'nm_instrutor ' => $this->nm_instrutor, 'nm_especialidade_instrutor' => $this->nm_especialidade_instrutor, 'modalidade_id' => $this->modalidade_id]);
	}

	public static function toJsonEstatico($id_instrutor, $nm_instrutor, $nm_especialidade_instrutor, $modalidade_id)
	{
		return json_encode(['id_instrutor' => $id_instrutor, 'nm_instrutor ' => $nm_instrutor, 'nm_especialidade_instrutor' => $nm_especialidade_instrutor, 'modalidade_id' => $modalidade_id]);
	}

	use trait__get;
}
