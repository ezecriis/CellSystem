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
  <title>Equipos</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/agency.min.css" rel="stylesheet">
</head>
<body>
<?php include "../includes/nav.php"; ?>
<div class="container">
  <br>
  <br>
  <br>
  <h6 align="center">MODIFICAR EQUIPO</h6>
  <div class="row">

    <div class="col-5 p-4">

      <?php
      $archivo = fopen('../BD/equipo_venta.dat','r') or die ("Error");
      $encontro=0;
      while (!feof($archivo)){
        $linea = fgets($archivo);
        $datos = explode("|", $linea);
        if ($_SESSION['art_equipo']==$datos[0]){
            $_SESSION['tipo_equipo']=$datos[1];
            $_SESSION['marca_equipo']=$datos[2];
            $_SESSION['modelo_equipo']=$datos[3];
            $_SESSION['precio_equipo']=$datos[4];
            $_SESSION['estado_equipo']=$datos[5];
            $_SESSION['stock_equipo']=$datos[6];
            $encontro=1;
          }
        }
        if ($encontro==1){
            echo '<form action="modificar_equipo.php" name="formulario" id="formulario" method="post">';
            echo '<table class="table table-hover">
            <tbody>';
            echo"<tr>";
            echo "<th scope='row'>ARTÍCULO</th>";
            echo "<td>".$_SESSION['art_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modart">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>TIPO</th>";
            echo "<td>".$_SESSION['tipo_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modtipo">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>MARCA</th>";
            echo "<td>".$_SESSION['marca_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modmarca">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>MODELO</th>";
            echo "<td>".$_SESSION['modelo_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modmodelo">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>PRECIO</th>";
            echo "<td>".$_SESSION['precio_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modprecio">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>STOCK</th>";
            echo "<td>".$_SESSION['stock_equipo']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modstock">Modificar</button></td>';
            echo"</tr>";
            echo "<th scope='row'>ESTADO</th>";
            if($_SESSION['estado_equipo']==0){
              echo "<td>Inactivo</td>";
              echo '<td><button  class="btn btn-primary" type="submit" name="modestadobaja">Activar</button></td>';
            }else{
              echo "<td>Activo</td>";
              echo '<td><button  class="btn btn-primary" type="submit" name="modestadoalta">Desactivar</button></td>';
            }
            echo"</tr>";
            echo '</tbody>
            </table>';
            echo'</form>';
          }?>
    </div>

    <div class="col-1">
    </div>

    <div class="col-4">
      <br>
      <?php if(isset($_POST['modart'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR ARTÍCULO:</label>
            <input class="form-control" type="text" name="art" autofocus   required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarart">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modtipo'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR TIPO:</label>
            <select class="form-control" name="tipo" autofocus required>
              <option>Celular</option>
              <option>PC</option>
              <option>Netbook</option>
              <option>Notebook</option>
              <option>Tablet</option>
            </select>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviartipo">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modmarca'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR MARCA:</label>
            <select class="form-control" name="marca" autofocus required>
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
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarmarca" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modmodelo'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario"  method="post">
          <div class="form-group">
            <label for="control">MODIFICAR MODELO:</label>
            <input class="form-control" type="text" name="modelo"  autofocus  required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarmodelo" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modprecio'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario"  method="post">
          <div class="form-group">
            <label for="control">MODIFICAR PRECIO:</label>
            <input class="form-control" type="text" name="precio"  placeholder="00,00" autofocus required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarprecio" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modstock'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" id="formulario" method="post">
          <div class="form-group">
           <label for="control">MODIFICAR STOCK:</label>
           <input class="form-control" type="text" name="stock"  autofocus required>
          </div>
         <div class="form-group">
           <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarstock" id="enviar">Guardar Cambio</button>
         </div>
        </form>
      <?php elseif(isset($_POST['modestadoalta'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" id="formulario" method="post">
          <div class="form-group">
           <label for="control">Baja Equipo</label>
          </div>
         <div class="form-group">
           <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarbaja" id="enviar">Guardar Cambio</button>
         </div>
        </form>
      <?php elseif(isset($_POST['modestadobaja'])):?>
        <form action="../back/modificar_equipo2.php" name="formulario" id="formulario" method="post">
          <div class="form-group">
           <label for="control">Alta Equipo</label>
          </div>
         <div class="form-group">
           <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviaralta" id="enviar">Guardar Cambio</button>
         </div>
        </form>
      <?php endif;?>
    </div>
  </div>

</div>
</body>
<?php include "../includes/footer.php"; ?>
</html>
