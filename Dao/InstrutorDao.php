<?php

	const hostDb = "mysql:host=localhost;dbname=academia";
  	const usuario = "root";
  	const senha = "";

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$pdo = new PDO(hostDb,usuario,senha);

		$cmm = $pdo->prepare('SELECT i.id_instrutor, i.nm_instrutor, i.nm_especialidade_instrutor, m.nm_modalidade FROM instrutor i JOIN modalidade m ON (i.modalidade_id = m.id_modalidade)');

		//$cmm = $pdo->prepare('select id_instrutor, nm_instrutor, nm_especialidade_instrutor, m.nm_modalidade from instrutor i join modalidade m ON (i.modalidade_id = m.id_modalidade)');
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

		$cmm = $pdo->prepare('INSERT INTO instrutor VALUES(NULL,:pnm_instrutor,:pnm_especialidade_instrutor,:pmodalidade_id)');

		$cmm->execute([':pnm_instrutor'=>$aux->nm_instrutor, ':pnm_especialidade_instrutor'=>$aux->nm_especialidade_instrutor, ':pmodalidade_id'=>$aux->modalidade_id]);

		http_response_code(201);

		echo $json;

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'PUT')
	{

		$json = file_get_contents("php://input");

		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$cmm = $pdo->prepare('UPDATE instrutor SET nm_instrutor = :pnm_instrutor, nm_especialidade_instrutor = :pnm_especialidade_instrutor, modalidade_id = :pmodalidade_id WHERE id_instrutor = :pid_instrutor');

		$cmm->execute([':pnm_instrutor'  => $aux->nm_instrutor, ':pnm_especialidade_instrutor'  => $aux->nm_especialidade_instrutor, ':pmodalidade_id'  => $aux->modalidade_id, ':pid_instrutor' => $aux->id_instrutor ]);

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

		$cmm = $pdo->prepare('DELETE FROM instrutor WHERE id_instrutor = :pid_instrutor');

		$cmm->execute([  ':pid_instrutor' => $aux->id_instrutor  ]);

		http_response_code(200);

		echo '{"resultado" : "excluído"}';
	}
?>