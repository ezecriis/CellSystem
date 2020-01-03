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
    #nuevoEquipo{
      display: none;
    }
    #ver{
      display: none;
    }
    #buscar{
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
  <h6 align="center">VENTAS</h6>
  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a  class="nav-link" href="javascript:void(0);" onclick="mostrarNuevo();">Nuevo Equipo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="javascript:void(0);" onclick="mostrarVer();">Ver Equipos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="javascript:void(0);" onclick="mostrarBuscar();">Buscar Equipo</a>
  </li>
</ul>
<br>
<br>
<div class="row">
  <div class="col">
  </div>

  <div class="col-4" id="buscar">
    <form class="form-inline" action="equipos_ventas.php" method="post">
      <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Ingrese Artículo" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 "name="enviarart" type="submit">Buscar</button>&nbsp
    </form>
  </div>

  <div class="col-5 p-4 border border-warning" id="nuevoEquipo">
    <h2 align="center"><small>NUEVO EQUIPO</small></h2>
    <form  action="../back/nuevoequipo.php" method="post">
      <div class="form-group">
        <label>Artículo:</label>
        <input class="form-control" type="text" name="articulo"    required>
      </div>
      <div class="form-group">
        <label>Tipo:</label>
        <select class="form-control" name="tipo" autofocus>
          <option>Celular</option>
          <option>PC</option>
          <option>Netbook</option>
          <option>Notebook</option>
          <option>Tablet</option>
        </select>
      </div>
      <div class="form-group">
        <label>Marca:</label>
        <select class="form-control" name="marca" autofocus>
          <option>Acer</option>
          <option>Admiral</option>
          <option>Airis</option>
          <option>Alcatel</option>
          <option>Amazon</option>
          <option>Apple</option>
          <option>Asus</option>
          <option>Banghó</option>
          <option>BGH</option>
          <option>BGH Positivo</option>
          <option>Compac</option>
          <option>CX</option>
          <option>Dell</option>
          <option>Dinax</option>
          <option>eNova</option>
          <option>Envizen</option>
          <option>Exo</option>
          <option>Gadnic</option>
          <option>Genérico</option>
          <option>Gigabyte</option>
          <option>HP</option>
          <option>Huawei</option>
          <option>IBM</option>
          <option>Intel</option>
          <option>IPad</option>
          <option>Lenovo</option>
          <option>LG</option>
          <option>Master-G</option>
          <option>Microsoft</option>
          <option>Motorola</option>
          <option>MSI</option>
          <option>NEXT</option>
          <option>Noblex</option>
          <option>NogaNet</option>
          <option>Nokia</option>
          <option>Overtech</option>
          <option>Performance</option>
          <option>Philips</option>
          <option>Razer</option>
          <option>RCA</option>
          <option>Samsung</option>
          <option>Sony</option>
          <option>Titan</option>
          <option>Toshiba</option>
          <option>TCL</option>
          <option>X-View</option>
        </select>
      </div>
      <div class="form-group">
        <label>Modelo:</label>
        <input class="form-control" type="text" name="modelo" required>
      </div>
      <div class="form-group">
        <label>Precio:</label>
        <input class="form-control" type="text" name="precio"  required placeholder="00,00">
      </div>
      <div class="form-group">
        <label>Stock:</label>
        <input class="form-control" type="text" name="stock"  required>
      </div>
      <div class="form-group">
        <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarequipo" id="enviar">Agregar</button>
      </div>
    </form>
  </div>

  <div class="col">
  </div>
</div>

<div id="ver">
<table class="table">
<thead>
  <tr class="bg-warning">
    <th scope="col">ARTÍCULO</th>
    <th scope="col">TIPO</th>
    <th scope="col">MARCA</th>
    <th scope="col">MODELO</th>
    <th scope="col">PRECIO</th>
    <th scope="col">ESTADO</th>
    <th scope="col">STOCK</th>
  </tr>
</thead>
<tbody>
  <?php
$archivo = fopen('../BD/equipo_venta.dat','r') or die ("Error");
while (!feof($archivo)){
    $linea = fgets($archivo);
    $datos = explode("|", $linea);
    if(!empty($datos[0])){
      echo"<tr>";
      echo "<td>".$datos[0]."</td>";
      echo "<td>".$datos[1]."</td>";
      echo "<td>".$datos[2]."</td>";
      echo "<td>".$datos[3]."</td>";
      echo "<td>".$datos[4]."</td>";
    if($datos[5]==0){
    echo "<td>Sin disponibilidad</td>";
  }else{echo "<td>Disponible</td>";
    }
    echo "<td>".$datos[6]."</td>";
    echo"</tr>";
  }
}
echo '</tbody>
</table>';
 ?>
</div>

<div id="tabla_busqueda">
  <?php
     if(isset($_POST['enviarart'])){
       $_SESSION['art_equipo']=$_POST['busqueda'];//se guarda el dni en la sesion para acciones
       $art_busqueda=$_POST['busqueda'];
       $archivo = fopen('../BD/equipo_venta.dat','r') or die ("Error");
       $encontro=0;
       while (!feof($archivo))
       {
           $linea = fgets($archivo);
           $datos = explode("|", $linea);
           if ($art_busqueda==$datos[0])
           {
             $tipo=$datos[1];
             $marca=$datos[2];
             $modelo=$datos[3];
             $precio=$datos[4];
             $estado=$datos[5];
             $stock=$datos[6];
             $encontro=1;
             }
       }
       if ($encontro==1){
         echo '<table class="table">
         <thead>
           <tr class="bg-warning">
             <th scope="col">ARTÍCULO</th>
             <th scope="col">TIPO</th>
             <th scope="col">MARCA</th>
             <th scope="col">MODELO</th>
             <th scope="col">PRECIO</th>
             <th scope="col">STOCK</th>
             <th scope="col">ESTADO</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody>';
         echo"<tr>";
         echo "<td>".$_SESSION['art_equipo']."</td>";
         echo "<td>".$tipo."</td>";
         echo "<td>".$marca."</td>";
         echo "<td>".$modelo."</td>";
         echo "<td>".$precio."</td>";
         echo "<td>".$stock."</td>";
       if($estado==0){
         echo "<td>Inactivo</td>";
       }else{
         echo "<td>Activo</td>";
       }
         echo '<td><a href="modificar_equipo.php" class="btn btn-primary btn-sm">Modificar</a></td>';
         echo"</tr>";
         echo '</tbody>
         </table>';
       }else{
           echo "<script> alert('El artículo no existe.');</script>";
       }
     }
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
  <script type="text/javascript">
    function mostrarNuevo(){
      document.getElementById('nuevoEquipo').style.display ='block';
      document.getElementById('buscar').style.display ='none';
      document.getElementById('ver').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
    }

    function mostrarBuscar(){
      document.getElementById('buscar').style.display ='block';
      document.getElementById('nuevoEquipo').style.display ='none';
      document.getElementById('ver').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
    }
    function mostrarVer(){
      document.getElementById('ver').style.display ='block';
      document.getElementById('buscar').style.display ='none';
      document.getElementById('nuevoEquipo').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
    }
  </script>
</body>
  <?php include "../includes/footer.php"; ?>
</html>
