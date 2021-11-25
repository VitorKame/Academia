<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		async function consulta() {
			let resposta = await fetch('/Academia/Dao/ModalidadeDao.php');
			let vetorModalidade = await resposta.json();

			if (vetorModalidade.length == 0) {
				let divCard = document.createElement("div");
				let divCardBody = document.createElement("div");
				divCard.className = "card";
				divCardBody.className = "card-body";
				divCardBody.textContent = "Sem dados.";

				divCard.appendChild(divCardBody);
				dados.appendChild(divCard);
			} else {

				for (let modalidade of vetorModalidade) {
					const tr = document.createElement("tr");
					dados.appendChild(tr);

					for (var i = 0; i < 5; i++) {

						const td = document.createElement("td");
						const a = document.createElement("a");
						const b = document.createElement("button");
						a.className = "btn btn-primary btn-small";
						b.className = "btn btn-primary btn-small";
						switch (i) {
							case 0:
								td.textContent = modalidade.id_modalidade;
								dados.appendChild(td);
								break;
							case 1:
								td.textContent = modalidade.nm_modalidade;
								dados.appendChild(td);
								break;
							case 2:
								td.textContent = modalidade.qt_aulas_modalidade;
								dados.appendChild(td);
								break;
							case 3:
								a.href = 'modalidade-update.php?id=' + modalidade.id_modalidade + '';
								a.innerText = 'Editar';
								td.appendChild(a);
								dados.appendChild(td);
								break;
							case 4:
								b.innerHTML = 'Deletar';
								b.addEventListener('click', async function(e) {
									e.preventDefault();
									var r = confirm("Apagar?");
									if (r) {
										var json = {
											id_modalidade: modalidade.id_modalidade
										};
										var retorno = await fetch('/Academia/Dao/ModalidadeDao.php', {
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
		<a class="btn-primary" href="/academia/Views/Modalidade/modalidade-create.php">Incluir</a>
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