<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Plano CSV</title>
</head>

<body>
  <?php include '../cabecalho.php'; ?>
  <div class="container">
    <div class="col-sm-12">
      <h3>Importa Dados - Plano</h3>
      <form method="post" enctype="multipart/form-data" action="../../Dao/PlanoImportaDadosDao.php">

        <label for="idArq1">Arquivo 1</label>
        <input type="file" name="arq1" value="" id="idArq1" />
        <br />
        <br />
        <input type="submit" name="cmd" value="Carregar" />

      </form>
    </div>
  </div>
  <?php include '../rodape.php'; ?>
</body>

</html>