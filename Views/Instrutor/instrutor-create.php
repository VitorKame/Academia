<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body onload="carregaSelectModalidades()">
	<?php include '..\cabecalho.php'; ?>
	<div class="container">
	<div class="col-sm-12">
	<form id="form1">
		<div class="form-group">
			<p>Nome: <input type="text" name="nm_instrutor" required maxlength="100" class="form-control"></p>
			<p>Especialidade: <input type="text" name="nm_especialidade_instrutor" required maxlength="100" class="form-control"></p>
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
	async function carregaSelectModalidades() {
		let resposta = await fetch('/Academia/Dao/ModalidadeDao.php');
		let vetorInstrutores = await resposta.json();
		const tr = document.createElement("select");
		tr.name = "modalidade_id";
		for (let instrutor of vetorInstrutores) {

			const td = document.createElement("option");
			td.value = instrutor.id_modalidade;
			td.textContent = instrutor.nm_modalidade;
			tr.appendChild(td);

		}
		dados.appendChild(tr);
	}

	form1.onsubmit = async function(e) {
		e.preventDefault();
		var json = {
			nm_instrutor: form1.nm_instrutor.value,
			nm_especialidade_instrutor: form1.nm_especialidade_instrutor.value,
			modalidade_id: form1.modalidade_id.value
		};
		var resposta = await fetch('/Academia/Dao/InstrutorDao.php', {
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