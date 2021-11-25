<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		async function consulta() {
			let resposta = await fetch('/Academia/Dao/AlunoDao.php');
			let vetorAluno = await resposta.json();

			if (vetorAluno.length == 0) {
				let divCard = document.createElement("div");
				let divCardBody = document.createElement("div");
				divCard.className = "card";
				divCardBody.className = "card-body";
				divCardBody.textContent = "Sem dados.";

				divCard.appendChild(divCardBody);
				dados.appendChild(divCard);
			} else {

				for (let aluno of vetorAluno) {
					const tr = document.createElement("tr");
					dados.appendChild(tr);
					for (var i = 0; i < 8; i++) {

						const td = document.createElement("td");
						const a = document.createElement("a");
						const b = document.createElement("button");
						a.className = "btn btn-primary btn-small";
						b.className = "btn btn-primary btn-small";
						switch (i) {
							case 0:
								td.textContent = aluno.cd_matricula_aluno;
								dados.appendChild(td);
								break;
							case 1:
								td.textContent = aluno.nm_aluno;
								dados.appendChild(td);
								break;
							case 2:
								td.textContent = aluno.nm_especialidade_instrutor;
								dados.appendChild(td);
								break;
							case 3:
								td.textContent = aluno.nm_email_aluno;
								dados.appendChild(td);
								break;
							case 4:
								td.textContent = aluno.cd_cpf_aluno;
								dados.appendChild(td);
								break;
							case 5:
								td.textContent = aluno.nm_plano;
								dados.appendChild(td);
								break;
							case 6:
								a.href = 'aluno-update.php?id=' + aluno.cd_matricula_aluno;
								a.innerText = 'Editar';
								td.appendChild(a);
								dados.appendChild(td);
								break;
							case 7:
								b.innerHTML = 'Deletar';
								b.addEventListener('click', async function(e) {
									e.preventDefault();
									var r = confirm("Apagar?");
									if (r) {
										var json = {
											cd_matricula_aluno: aluno.cd_matricula_aluno
										};
										var retorno = await fetch('/Academia/Dao/AlunoDao.php', {
											method: 'DELETE',
											body: JSON.stringify(json)
										});
										if (retorno.ok) {
											refresh();
										} else {
											result.textContent = "FALHOU";
										}
									}
								});
								td.appendChild(b);
								dados.appendChild(td);
								break;
							default:
								break;
						}
					}
				}
			}
		}

		function refresh() {
			// excluir todos os parágrafos
			while (dados.hasChildNodes()) {
				dados.removeChild(dados.childNodes[0]);
			}
			// Consultar API
			consulta();
		}
	</script>
</head>

<body onload="consulta()">
	<?php include '..\cabecalho.php'; ?>
	<h4 id="result"></h4>
	<button class="btn btn-primary btn-small">
		<a class="btn-primary" href="/academia/Views/Aluno/aluno-create.php">Incluir</a>
	</button>
	<button class="btn btn-primary btn-small" onclick="refresh()">Refresh</button>
	<div class="container">
		<div class="col-sm-12">
			<table class="table table-striped" style="margin-top: 5px" id="dados">

			</table>
		</div>
	</div>
	<?php include '..\rodape.php'; ?>
</body>

</html>