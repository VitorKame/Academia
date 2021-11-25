<?php

namespace Models;

class Aluno implements Idados
{
	protected $cd_matricula_aluno;
	protected $nm_aluno;
	protected $nm_email_aluno;
	protected $cd_cpf_aluno;
	protected $plano_id;

	public function __construct($cd_matricula_aluno, $nm_aluno, $nm_email_aluno, $cd_cpf_aluno, $plano_id)
	{
		$this->cd_matricula_aluno  = $cd_matricula_aluno;
		$this->nm_aluno  = $nm_aluno;
		$this->nm_email_aluno  = $nm_email_aluno;
		$this->cd_cpf_aluno = $cd_cpf_aluno;
		$this->plano_id  = $plano_id;
	}

	public function toString()
	{
		return $this->cd_matricula_aluno  . ' ' . $this->nm_aluno  . ' ' . $this->nm_email_aluno  . ' ' . $this->cd_cpf_aluno . ' ' . $this->plano_id;
	}

	public function toJson()
	{
		return json_encode(['cd_matricula_aluno ' => $this->cd_matricula_aluno, 'nm_aluno  ' => $this->nm_aluno, 'nm_email_aluno ' => $this->nm_email_aluno, 'cd_cpf_aluno' => $this->cd_cpf_aluno, 'plano_id ' => $this->plano_id]);
	}

	public static function toJsonEstatico($cd_matricula_aluno, $nm_aluno, $nm_email_aluno, $cd_cpf_aluno, $plano_id)
	{
		return json_encode(['cd_matricula_aluno ' => $cd_matricula_aluno, 'nm_aluno  ' => $nm_aluno, 'nm_email_aluno ' => $nm_email_aluno, 'cd_cpf_aluno' => $cd_cpf_aluno, 'plano_id ' => $plano_id]);
	}

	use trait__get;
}
