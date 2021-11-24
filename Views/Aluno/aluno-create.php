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
	async function carregaSelectPlanos() {
		let resposta = await fetch('/Academia/Dao/PlanoDao.php');
		let vetorInstrutores = await resposta.json();
		const tr = document.createElement("select");
		tr.name = "plano_id";
		for (let instrutor of vetorInstrutores) {

			const td = document.createElement("option");
			td.value = instrutor.id_plano;
			td.textContent = instrutor.nm_plano;
			tr.appendChild(td);

		}
		dados.appendChild(tr);
	}

	form1.onsubmit = async function(e) {
		e.preventDefault();
		var json = {
			nm_aluno: form1.nm_aluno.value,
			nm_email_aluno: form1.nm_email_aluno.value,
			cd_cpf_aluno: form1.cd_cpf_aluno.value,
			plano_id: form1.plano_id.value
		};
		var resposta = await fetch('/Academia/Dao/AlunoDao.php', {
			method: 'POST',
			body: JSON.stringify(json)
		});
		if (resposta.ok) {
			result.textContent = "Cadastrado";
		} else {
			result.textContent = "Falhou";
		}
	}
</script>