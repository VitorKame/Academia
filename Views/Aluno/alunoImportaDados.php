<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aluno CSV</title>
</head>

<body>
  <?php include '../cabecalho.php'; ?>
  <h3>Importa Dados - Aluno</h3>
  <form method="post" enctype="multipart/form-data" action="../../Dao/AlunoImportaDadosDao.php">
    <label for="idArq1">Arquivo 1</label>
    <input type="file" name="arq1" value="" id="idArq1" />
    <br />
    <br />
    <input type="submit" name="cmd" value="Carregar" />
  </form>
  <?php include '../rodape.php'; ?>
</body>

</html>