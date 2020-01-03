<?php session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}
?>
<!DOCTYPE html>
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
  <style media="screen">
    #reparacion{
      display: none;
    }
    #listos{
      display: none;
    }
    #buscar{
      display: none;
    }
    #entregados{
      display: none;
    }
  </style>
</head>
<body>
<?php include "../includes/nav.php"; ?>
<div class="container">
  <br>
  <br>
  <br>
  <h6 align="center">REPARACIONES</h6>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a  class="nav-link" href="javascript:void(0);" onclick="mostrarReparacion();">Equipos en Reparación</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0);" onclick="mostrarListos();">Equipos Listos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0);" onclick="mostrarEntregados();">Equipos Entregados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0);" onclick="mostrarBuscar();">Buscar Equipo por Cliente</a>
    </li>
  </ul>
  <br>
  <br>
  <div class="row">
    <div class="col">
    </div>

    <div class="col-4" id="buscar">
      <form class="form-inline" action="equipos_reparacion.php" method="post">
        <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Ingrese DNI" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0 "name="enviardni" type="submit">Buscar</button>&nbsp
      </form>
    </div>

    <div class="col">
    </div>
  </div>

  <div id="reparacion">
    <div class="col-4">
      <form action='../back/listos_entregados.php' name='formulario' method='post'>
        <div class="form-group">
          <label for="control">Ingrese el número de DNI de un equipo en condición de pasar a listos:</label>
          <input class="form-control" type='text' name='dni_reparacion'  placeholder='DNI del cliente' required>
        </div>
        <div class="form-group">
          <button  class='btn btn-primary' type='submit' name='pasar_listos'>Pasar equipo a Listos</button>
        </div>
      </form>
    </div>

    <h4 align="center">EQUIPOS EN REPARACIÓN</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">DNI CLIENTE</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TIPO</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">FECHA ENTRADA</th>
          <th scope="col">FECHA SALIDA</th>
          <th scope="col">PRECIO</th>
          <th scope="col">TIPO REP.</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
        while (!feof($archivo)){
            $linea = fgets($archivo);
            $datos = explode("|", $linea);
            if(!empty($datos[0])){
              if($datos[10]==0){
                echo"<tr>";
                echo "<td>".$datos[0]."</td>";
                echo "<td>".$datos[1]."</td>";
                echo "<td>".$datos[2]."</td>";
                echo "<td>".$datos[3]."</td>";
                echo "<td>".$datos[4]."</td>";
                echo "<td>".$datos[5]."</td>";
                echo "<td>".$datos[6]."</td>";
                if($datos[7]==0){
                  echo "<td>Sin entregar</td>";
                }else{
                  echo "<td>".$datos[7]."</td>";
                }
                echo "<td>".$datos[8]."</td>";
                echo "<td>".$datos[9]."</td>";
                echo "<td>
                </td>";
              }
            }
            echo"</tr>";
        }
        echo '</tbody>';
        echo"</table>";
        ?>
  </div>

  <div id="listos">
    <div class="col-4">
      <form action='../back/listos_entregados.php' name='formulario' method='post'>
        <div class="form-group">
          <label for="control">Ingrese el número de DNI de un equipo para registrar una entrega:</label>
          <input class="form-control" type='text' name='dni_entrega'  placeholder='DNI del cliente' required>
        </div>
        <div class="form-group">
          <label for="control">Fecha de entrega:</label>
          <input class="form-control" type='date' name='fecha_salida' required>
        </div>
        <div class="form-group">
          <button  class='btn btn-primary' type='submit' name='registrar_entrega'>Registrar Entrega</button>
        </div>
      </form>
    </div>
    <h4 align="center">EQUIPOS LISTOS PARA ENTREGAR</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">DNI CLIENTE</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TIPO</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">FECHA ENTRADA</th>
          <th scope="col">FECHA SALIDA</th>
          <th scope="col">PRECIO</th>
          <th scope="col">TIPO REP.</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
        while (!feof($archivo)){
          $linea = fgets($archivo);
          $datos = explode("|", $linea);
          if(!empty($datos[0])){
            if($datos[10]==1){
              echo"<tr>";
              echo "<td>".$datos[0]."</td>";
              echo "<td>".$datos[1]."</td>";
              echo "<td>".$datos[2]."</td>";
              echo "<td>".$datos[3]."</td>";
              echo "<td>".$datos[4]."</td>";
              echo "<td>".$datos[5]."</td>";
              echo "<td>".$datos[6]."</td>";
              if($datos[7]==0){
                echo "<td>Sin entregar</td>";
              }else{
                echo "<td>".$datos[7]."</td>";
              }
              echo "<td>".$datos[8]."</td>";
              echo "<td>".$datos[9]."</td>";
              echo "<td>
              </td>";
            }
          }
          echo"</tr>";
        }
        echo '</tbody>
        </table>';
        ?>
  </div>

  <div id="entregados" class="row bg-light">
    <h4 align="center">EQUIPOS ENTREGADOS</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">DNI CLIENTE</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TIPO</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">FECHA ENTRADA</th>
          <th scope="col">FECHA SALIDA</th>
          <th scope="col">PRECIO</th>
          <th scope="col">TIPO REP.</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
      while (!feof($archivo)){
      $linea = fgets($archivo);
      $datos = explode("|", $linea);
      if(!empty($datos[0])){
        if($datos[10]==2){
          echo"<tr>";
          echo "<td>".$datos[0]."</td>";
          echo "<td>".$datos[1]."</td>";
          echo "<td>".$datos[2]."</td>";
          echo "<td>".$datos[3]."</td>";
          echo "<td>".$datos[4]."</td>";
          echo "<td>".$datos[5]."</td>";
          echo "<td>".$datos[6]."</td>";
          echo "<td>".$datos[7]."</td>";
          echo "<td>".$datos[8]."</td>";
          echo "<td>".$datos[9]."</td>";
        }
      }
      echo"</tr>";
      }
      echo '</tbody>
      </table>';
      ?>
  </div>
  <div id="tabla_busqueda">
    <?php
    if(isset($_POST['enviardni'])){
    echo'<h4 align="center">EQUIPOS DE CLIENTE</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">DNI CLIENTE</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TIPO</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">FECHA ENTRADA</th>
          <th scope="col">FECHA SALIDA</th>
          <th scope="col">PRECIO</th>
          <th scope="col">TIPO REP.</th>
        </tr>
      </thead>
      <tbody>';
      $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
      $hayequipo=0;
      while (!feof($archivo)){
        $linea = fgets($archivo);
        $datos = explode("|", $linea);
        if(!empty($datos[0])){
          if($datos[0]==$_POST['busqueda']){
            echo"<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "<td>".$datos[5]."</td>";
            echo "<td>".$datos[6]."</td>";
            $hayequipo=1;
            if($datos[7]==0){
              echo "<td>Sin entregar</td>";
            }else{
              echo "<td>".$datos[7]."</td>";
            }
            echo "<td>".$datos[8]."</td>";
            echo "<td>".$datos[9]."</td>";
            echo"</tr>";
            echo '</tbody>
            </table>';
            if($datos[10]==0){
              echo"<p class='text-danger' align='center'>El equipo está siendo reparado.</p>";
            }elseif($datos[10]==1){
              echo "<p class='text-danger' align='center'>El equipo está listo para ser entregado.</p>";
              echo "<form action='equipos_reparacion.php' name='formulario' method='post'>
              <center><button class='btn btn-primary' type='submit' name='entrega'>Registrar Entrega</button></center>
              </form>";
            }else{
              echo "<p class='text-danger' align='center'>El equipo fue entregado.</p>";
            }
          }
        }
      }
        if($hayequipo==0){
          echo "El Cliente no tiene equipos registrados";
        }
    }
      ?>
  </div>
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm" id="entrega">
      <?php if(isset($_POST['entrega'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">FECHA DE ENTREGA DEL EQUIPO REPARADO:</label>
            <input class="form-control" type="date" name="fecha_salida" autofocus   required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarsalida">Guardar Cambio</button>
          </div>
        </form>
        <?php endif; ?>
    </div>
    <div class="col-sm">
    </div>
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
  <script type="text/javascript">

    function mostrarReparacion(){
      document.getElementById('reparacion').style.display ='block';
      document.getElementById('buscar').style.display ='none';
      document.getElementById('listos').style.display ='none';
      document.getElementById('entregados').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
    }

    function mostrarBuscar(){
      document.getElementById('buscar').style.display ='block';
      document.getElementById('reparacion').style.display ='none';
      document.getElementById('listos').style.display ='none';
      document.getElementById('entregados').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
      document.getElementById('entrega').style.display ='none';
    }
    function mostrarListos(){
      document.getElementById('listos').style.display ='block';
      document.getElementById('buscar').style.display ='none';
      document.getElementById('reparacion').style.display ='none';
      document.getElementById('entregados').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
      document.getElementById('entrega').style.display ='none';

    }
    function mostrarEntregados(){
      document.getElementById('entregados').style.display ='block';
      document.getElementById('buscar').style.display ='none';
      document.getElementById('reparacion').style.display ='none';
      document.getElementById('listos').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
      document.getElementById('entrega').style.display ='none';

    }
  </script>
</body>
  <?php include "../includes/footer.php"; ?>
</html>
