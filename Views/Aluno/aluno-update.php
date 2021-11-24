<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body onload="carregaSelectPlanos()">
	<?php include '..\cabecalho.php'; ?>
	<div class="container">
	<div class="col-sm-12">
	<form id="form1">
		<div class="form-group">
			<p>Matricula: <input type="text" name="cd_matricula_aluno" required maxlength="100" class="form-control"></p>
			<p>Nome: <input type="text" name="nm_aluno" required maxlength="100" class="form-control"></p>
			<p>Email: <input type="text" name="nm_email_aluno" required maxlength="100" class="form-control"></p>
			<p>CPF: <input type="text" name="cd_cpf_aluno" required maxlength="100" class="form-control"></p>			
			<p id="dados"/>
			<p><input type="submit" value="Salvar" class="btn btn-primary btn-small"></p>
		</div>
	</form>
	<h3 id="result"></h3>
	</div>
	</div>
	<?php include '..\rodape.php'; ?>
</body>

</html>
<script type="text/javascript">
	cd_matricula_aluno.value = window.location.href.split('=').pop();
	form1.onsubmit = async function(e) {
		e.preventDefault();
		var json = {
			nm_aluno: form1.nm_aluno.value,
			nm_email_aluno: form1.nm_email_aluno.value,
			cd_cpf_aluno: form1.cd_cpf_aluno.value,
			plano_id: form1.plano_id.value,
			cd_matricula_aluno: form1.cd_matricula_aluno.value			
		};
		var resposta = await fetch('/Academia/Dao/AlunoDao.php', {
			method: 'PUT',
			body: JSON.stringify(json)
		});
		if (resposta.ok) {
			result.textContent = "Alterado";
		} else {
			result.textContent = "Falhou";
		}
	}

	async function carregaSelectPlanos() {
		let resposta = await fetch('/Academia/Dao/PlanoDao.php');
		let vetorPlano = await resposta.json();
		const selectPlano = document.createElement("select");
		selectPlano.name = "plano_id";
		for (let plano of vetorPlano) {
			const optionPlano = document.createElement("option");
			optionPlano.value = instrutor.id_plano;
			optionPlano.textContent = instrutor.nm_plano;
			selectPlano.appendChild(optionPlano);
		}
		dados.appendChild(selectPlano);
	}
</script>