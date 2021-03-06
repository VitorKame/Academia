<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<?php include '..\cabecalho.php'; ?>
	<div class="container">
		<div class="col-sm-12">
			<form id="form1">
				<div class="form-group">
					<p>Nome: <input type="text" name="nm_modalidade" required maxlength="100" class="form-control"></p>
					<p>Aulas: <input type="text" name="qt_aulas_modalidade" required maxlength="100" class="form-control"></p>
					<p><input type="submit" value="Salvar" class="btn btn-primary btn-small"></p>
				</div>
			</form>
			<div class="container">
				<div class="col-sm-12">
					<h3 id="result"></h3>
					<?php include '..\rodape.php'; ?>
</body>

</html>
<script type="text/javascript">
	form1.onsubmit = async function(e) {
		e.preventDefault();
		var json = {
			nm_modalidade: form1.nm_modalidade.value,
			qt_aulas_modalidade: form1.qt_aulas_modalidadeaula.value
		};
		var resposta = await fetch('/Academia/Dao/ModalidadeDao.php', {
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