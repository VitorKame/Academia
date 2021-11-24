<?php

	const hostDb = "mysql:host=localhost;dbname=academia_teste";
  	const usuario = "root";
  	const senha = "";

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "SELECT";
		$qry .= "a.nm_aluno,";
		$qry .= "a.nm_email_aluno,";
		$qry .= "a.cd_cpf_aluno,";
		$qry .= "a.cd_cpf_aluno,";
		$qry .= "p.id_plano";
		$qry .= "FROM";
		$qry .= "aluno a";
		$qry .= "JOIN plano p ON (a.plano_id = p.id_plano)";

		$cmm = $pdo->prepare($qry);

		$cmm->execute();

		$alunos = $cmm->fetchAll(PDO::FETCH_ASSOC);

		http_response_code(200);

		echo json_encode($alunos);

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$json = file_get_contents("php://input");

		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "INSERT INTO";
		$qry .= "aluno";
		$qry .= "VALUES";
		$qry .= "(NULL,";
		$qry .= ":pnm_aluno,";
		$qry .= ":pnm_email_aluno,";
		$qry .= ":pcd_cpf_aluno,";
		$qry .= ":pplano_id)";

		$cmm = $pdo->prepare($qry);

		$cmm->execute([':pnm_aluno'=>$aux->nm_aluno, ':pnm_email_aluno'=>$aux->nm_email_aluno, ':pcd_cpf_aluno'=>$aux->cd_cpf_aluno, ':pplano_id'=>$aux->plano_id]);

		http_response_code(201);

		echo $json;

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'PUT')
	{

		$json = file_get_contents("php://input");

		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "UPDATE";
		$qry .= "aluno";
		$qry .= "SET";
		$qry .= "nm_aluno = :pnm_aluno,";
		$qry .= "nm_email_aluno = :pnm_email_aluno,";
		$qry .= "cd_cpf_aluno = :pcd_cpf_aluno,";
		$qry .= "plano_id = :pplano_id";
		$qry .= "WHERE";
		$qry .= "cd_matricula_aluno = :pcd_matricula_aluno";

		$cmm = $pdo->prepare($qry);

		$cmm->execute([':pnm_aluno'=>$aux->nm_aluno, ':pnm_email_aluno'=>$aux->nm_email_aluno, ':pcd_cpf_aluno'=>$aux->cd_cpf_aluno, ':pplano_id'=>$aux->plano_id, ':pcd_matricula_aluno'=>$aux->cd_matricula_aluno]);

		http_response_code(200);

		echo $json;

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		// excluir uma da tabela alunos

		$json = file_get_contents("php://input");

		// exclusão de aluno conforme os dados vindos no json
		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "DELETE FROM";
		$qry .= "aluno";
		$qry .= "WHERE";
		$qry .= "cd_matricula_aluno = :pcd_matricula_aluno";

		$cmm = $pdo->prepare($qry);

		$cmm->execute([':pcd_matricula_aluno'=>$aux->cd_matricula_aluno]);

		http_response_code(200);

		echo '{"resultado" : "excluído"}';
	}
?>