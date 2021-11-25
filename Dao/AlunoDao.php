<?php

	const hostDb = "mysql:host=localhost;dbname=academia";
  	const usuario = "root";
  	const senha = "";

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "SELECT a.nm_aluno, a.nm_email_aluno, a.cd_matricula_aluno, a.cd_cpf_aluno, p.nm_plano FROM aluno a JOIN plano p ON (a.plano_id = p.id_plano)";

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

		$qry = "INSERT INTO aluno VALUES (NULL, :pnm_aluno, :pnm_email_aluno, :pcd_cpf_aluno, :pplano_id)";

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

		$qry = "UPDATE aluno SET nm_aluno = :pnm_aluno, nm_email_aluno = :pnm_email_aluno, cd_cpf_aluno = :pcd_cpf_aluno, plano_id = :pplano_id WHERE cd_matricula_aluno = :pcd_matricula_aluno";

		$cmm = $pdo->prepare($qry);

		$cmm->execute([':pnm_aluno'=>$aux->nm_aluno, ':pnm_email_aluno'=>$aux->nm_email_aluno, ':pcd_cpf_aluno'=>$aux->cd_cpf_aluno, ':pplano_id'=>$aux->plano_id, ':pcd_matricula_aluno'=>$aux->cd_matricula_aluno]);

		http_response_code(200);

		echo $json;

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$json = file_get_contents("php://input");

		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$qry = "DELETE FROM aluno WHERE cd_matricula_aluno = :pcd_matricula_aluno";

		$cmm = $pdo->prepare($qry);

		$cmm->execute([':pcd_matricula_aluno'=>$aux->cd_matricula_aluno]);

		http_response_code(200);

		echo '{"resultado" : "excluído"}';
	}
?>