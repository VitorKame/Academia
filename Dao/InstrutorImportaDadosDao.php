<?php
$erro = array();
if ($_FILES) {
  $c = mysqli_connect("localhost", "root", "", "academia");
  $ps = mysqli_prepare($c, "INSERT INTO instrutor VALUES(?,?,?,?)");
  mysqli_stmt_bind_param($ps, "isss", $ID, $NMI, $NME, $MID);

  $status = move_uploaded_file($_FILES["arq1"]["tmp_name"], "../arquivo/" . $_FILES["arq1"]["name"]);

  if ($status) {
    $a = fopen("../arquivo/" . $_FILES["arq1"]["name"], "r");
    if ($a) {
      $lin = fgetcsv($a, 100, ";");
      $lin = fgetcsv($a, 100, ";");
      while ($lin != null) {
        $ID = $lin[0];
        $NMI = $lin[1];
        $NME = $lin[2];
        $MID = $lin[3];
        if (!mysqli_stmt_execute($ps)) {
          $erro[count($erro)] = "Linha ID={$lin[0]} não inserida";
        }
        $lin = fgetcsv($a, 100, ";");
      }
      fclose($a);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <title>Upload</title>
</head>

<body>
  <h3>Arquivo Carregado</h3>
  <h3>
    <?php
    foreach ($erro as $i => $v) {
      echo $v . "<br/>";
    }
    ?>
  </h3>
</body>

</html>