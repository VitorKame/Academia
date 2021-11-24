<?php

	const hostDb = "mysql:host=localhost;dbname=academia_teste";
  	const usuario = "root";
  	const senha = "";

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$pdo = new PDO(hostDb,usuario,senha);

		$cmm = $pdo->prepare('SELECT id_modalidade, nm_modalidade, qt_aulas_modalidade FROM modalidade');

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

		$cmm = $pdo->prepare('INSERT INTO modalidade VALUES(\'\',:pnm_modalidade,:pqt_aulas_modalidade)');

		$cmm->execute([':pnm_modalidade'  => $aux->nm_modalidade, ':pqt_aulas_modalidade'  => $aux->qt_aulas_modalidade]);

		http_response_code(201);

		echo $json;

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'PUT')
	{

		$json = file_get_contents("php://input");

		$aux = json_decode($json);  

		$pdo = new PDO(hostDb,usuario,senha);

		$cmm = $pdo->prepare('UPDATE modalidade SET nm_modalidade = :pnm_modalidade, qt_aulas_modalidade = :pqt_aulas_modalidade WHERE id_modalidade = :pid_modalidade');

		$cmm->execute([':pnm_modalidade'  => $aux->nm_modalidade, ':pqt_aulas_modalidade'  => $aux->qt_aulas_modalidade, ':pid_modalidade' => $aux->id_modalidade ]);

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

		$cmm = $pdo->prepare('DELETE FROM modalidade WHERE id_modalidade = :pid_modalidade');

		$cmm->execute([  ':pid_modalidade' => $aux->id_modalidade  ]);

		http_response_code(200);

		echo '{"resultado" : "excluído"}';
	}
?>