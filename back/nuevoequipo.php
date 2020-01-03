<?php
session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}
  $articulo = $_POST['articulo'];
  $tipo = $_POST['tipo'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $estado = '1';
  $encontro=0;
  $archivo = fopen('../BD/equipo_venta.dat','r') or die ("Error");
  while (!feof($archivo))
  {
    $linea = fgets($archivo);
    $datos = explode("|", $linea);

    if($datos[0] != null)
    {
      $articuloBD = $datos[0];
      if ($articulo == $articuloBD)
      {
        $encontro = 1;
      }
    }
  }
  fclose($archivo);

  if($encontro == 1)
  {
    echo "<script> alert('El artículo ya existe.');</script>";
    echo "<script> document.location.href='../web/equipos_ventas.php';</script>";
  }else{
    $archivo = fopen('../BD/equipo_venta.dat','a+') or die ("Error");
    fputs($archivo, $articulo."|".$tipo."|".$marca."|".$modelo."|".$precio."|".$estado."|".$stock."\n");
    fclose($archivo);
  }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cell System</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/agency.min.css" rel="stylesheet">
</head>
<body>
  <?php include "../includes/nav2.php"; ?>
<div class="container">
  <br>
  <br>
  <br>
  <h6 align="center">VENTAS</h6>
  <div  class="row bg-light">
    <h4 align="center">EQUIPO REGISTRADO</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">ARTÍCULO</th>
          <th scope="col">TIPO</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">PRECIO</th>
          <th scope="col">STOCK</th>
          <th scope="col">ESTADO</th>
        </tr>
      </thead>
      </thead>
      <tbody>
        <?php
          echo"<tr>";
          echo "<td>".$articulo."</td>";
          echo "<td>".$tipo."</td>";
          echo "<td>".$modelo."</td>";
          echo "<td>".$precio."</td>";
          echo "<td>".$stock."</td>";
          if($estado==0){
            echo "<td>Sin disponibilidad</td>";
          }else{
            echo "<td>Disponible</td>";
          }
          echo"</tr>";
          echo '</tbody>
          </table>';
          echo '</tbody>
        </table>';
        ?>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</body>
  <?php include "../includes/footer.php"; ?>
</html>
