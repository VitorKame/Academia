<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body onload="carregaSelectModalidades()">
	<?php include '..\cabecalho.php'; ?>

	<form id="form1">
		<div class="container">
			<div class="col-sm-12">
				<div class="form-group">
					<p>id: <input type="number" id="id_instrutor" name="id_instrutor" required maxlength="10" class="form-control" readonly></p>
					<p>Nome: <input type="text" name="nm_instrutor" required maxlength="100" class="form-control"></p>
					<p>Especialidade: <input type="text" name="nm_especialidade" required maxlength="100" class="form-control"></p>
					<p id="dados" />
					<p><input type="submit" value="Salvar" class="btn btn-primary btn-small"></p>
				</div>
			</div>
		</div>
	</form>
	<h3 id="result"></h3>

	<?php include '..\rodape.php'; ?>
</body>

</html>
<script type="text/javascript">
	id_instrutor.value = window.location.href.split('=').pop();
	form1.onsubmit = async function(e) {
		e.preventDefault();
		var json = {
			nm_instrutor: form1.nm_instrutor.value,
			nm_especialidade: form1.nm_especialidade.value,
			id_modalidade: form1.id_modalidade.value,
			id_instrutor: form1.id_instrutor.value
		};
		var resposta = await fetch('/Academia/Dao/InstrutorDao.php', {
			method: 'PUT',
			body: JSON.stringify(json)
		});
		if (resposta.ok) {
			result.textContent = "Alterado";
		} else {
			result.textContent = "Falhou";
		}
	}

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
</script>