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
  <title>Usuarios</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/agency.min.css" rel="stylesheet">
  <style media="screen">
    #mostrarHistorial{
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
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a  class="nav-link" href="javascript:void(0);" onclick="mostrarHistorial();">Historial de equipos reparados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0);" onclick="mostrarBuscar();">Buscar equipo en reparación</a>
    </li>
  </ul>
<br>
<br>
<div class="row">
  <div class="col">
  </div>

  <div class="col-4" id="buscar">
    <form class="form-inline" action="estado_equipo_cliente.php" method="post">
      <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Ingrese modelo del Equipo" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 "name="enviarmodelo" type="submit">Buscar</button>&nbsp
    </form>
  </div>



  <div id="mostrarHistorial">
    <h4 align="center">HISTORIAL DE REPARACIONES</h4>
    <?php
       if(isset($_POST['enviarmodelo'])){
         $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
         $encontro=0;
         while (!feof($archivo))
         {
             $linea = fgets($archivo);
             $datos = explode("|", $linea);
             if ($_SESSION['dni']==$datos[0])
             {
                 $nombre=$datos[1];
                 $apellido=$datos[2];
                 $tipo=$datos[3];
                 $marca=$datos[4];
                 $modelo=$datos[5];
                 $fechaE=$datos[6];
                 $fechaS=$datos[7];
                 $precio=$datos[8];
                 $reparacion=$datos[9];
                 $estado=$datos[10];
                 $encontro=1;
               }
            }
         }
         if ($encontro==1){
           echo '<table class="table">
           <thead>
             <tr class="bg-warning">
               <th scope="col">TIPO</th>
               <th scope="col">MARCA</th>
               <th scope="col">MODELO</th>
               <th scope="col">FECHA ENTRADA</th>
               <th scope="col">FECHA SALIDA</th>
               <th scope="col">PRECIO</th>
               <th scope="col">REPRACIÓN</th>
               <th scope="col">ESTADO</th>
             </tr>
           </thead>
           <tbody>';
           echo"<tr>";
           echo "<td>".$tipo."</td>";
           echo "<td>".$marca."</td>";
           echo "<td>".$modelo."</td>";
           echo "<td>".$fechaE."</td>";
           if($fechaS==0){
             echo "<td>Sin entregar</td>";
           }else{
             echo "<td>".$fechaS."</td>";
           }
           echo "<td>".$precio."</td>";
           echo "<td>".$reparacion."</td>";
           if($estado==0){
             echo "<td>En reparación</td>";
           }elseif ($estado==1) {
             echo "<td>Listo para Retirar/td>";
           }else{
             echo "<td>Entregado</td>";
           }
           echo"</tr>";
           echo '</tbody>
           </table>';
         }else{
             echo "<script> alert('No tiene equipos reparados.');</script>";
         }
       ?>
  </div>


  <div class="col">
  </div>
</div>

<div id="tabla_busqueda">
  <?php
     if(isset($_POST['enviarmodelo'])){
       $archivo = fopen('../BD/equipo_cliente.dat','r') or die ("Error");
       $encontro=0;
       while (!feof($archivo))
       {
           $linea = fgets($archivo);
           $datos = explode("|", $linea);
           if ($_SESSION['dni']==$datos[0])
           {
             if($_POST['busqueda']==$datos[5]){
               $nombre=$datos[1];
               $apellido=$datos[2];
               $tipo=$datos[3];
               $marca=$datos[4];
               $fechaE=$datos[6];
               $fechaS=$datos[7];
               $precio=$datos[8];
               $reparacion=$datos[9];
               $estado=$datos[10];
               $encontro=1;
             }
          }
       }
       if ($encontro==1){
         echo '<table class="table">
         <thead>
           <tr class="bg-warning">
             <th scope="col">TIPO</th>
             <th scope="col">MARCA</th>
             <th scope="col">MODELO</th>
             <th scope="col">FECHA ENTRADA</th>
             <th scope="col">PRECIO</th>
             <th scope="col">REPRACIÓN</th>
             <th scope="col">ESTADO</th>
           </tr>
         </thead>
         <tbody>';
         echo"<tr>";
         echo "<td>".$tipo."</td>";
         echo "<td>".$marca."</td>";
         echo "<td>".$_POST['busqueda']."</td>";
         echo "<td>".$fechaE."</td>";
         echo "<td>".$precio."</td>";
         echo "<td>".$reparacion."</td>";
         if($estado==0){
           echo "<td>En reparación</td>";
         }elseif ($estado==1) {
           echo "<td>Listo para Retirar/td>";
         }else{
           echo "<td>Entregado</td>";
         }
         echo"</tr>";
         echo '</tbody>
         </table>';
       }else{
           echo "<script> alert('El modelo no se encuentra registrado.');</script>";
       }
     }
     ?>
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
  function mostrarHistorial(){
    document.getElementById('mostrarHistorial').style.display ='block';
    document.getElementById('buscar').style.display ='none';
    document.getElementById('tabla_busqueda').style.display ='none';
  }
    function mostrarBuscar(){
      document.getElementById('buscar').style.display ='block';
      document.getElementById('mostrarHistorial').style.display ='none';
      document.getElementById('tabla_busqueda').style.display ='none';
    }
  </script>
</body>
  <?php include "../includes/footer.php"; ?>
</html>
