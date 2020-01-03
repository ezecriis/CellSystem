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
</head>
<body>
<?php include "../includes/nav.php"; ?>
<div class="container">
  <br>
  <br>
  <br>
  <h6 align="center">MODIFICAR CLIENTE/ADMINISTRADOR</h6>
  <div class="row">

    <div class="col-5 p-4">

      <?php
      $archivo = fopen('../BD/usuarios.dat','r') or die ("Error");
      $encontro=0;
      while (!feof($archivo)){
        $linea = fgets($archivo);
        $datos = explode("|", $linea);
        if ($_SESSION['dni_usuario']==$datos[0]){
            $_SESSION['nombre_usuario']=$datos[1];
            $_SESSION['apellido_usuario']=$datos[2];
            $_SESSION['tel_usuario']=$datos[3];
            $_SESSION['pass_usuario']=$datos[4];
            $_SESSION['email_usuario']=$datos[5];
            $_SESSION['perfil_usuario']=$datos[6];
            $_SESSION['estado_usuario']=$datos[7];
            $encontro=1;
          }
        }
        if ($encontro==1){
            echo '<form action="modificar_usuario.php" name="formulario" id="formulario" method="post">';
            echo '<table class="table table-hover">
            <tbody>';
            echo"<tr>";
            echo "<th scope='row'>DNI</th>";
            echo "<td>".$_SESSION['dni_usuario']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="moddni">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>NOMBRE</th>";
            echo "<td>".$_SESSION['nombre_usuario']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modnombre">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>APELLIDO</th>";
            echo "<td>".$_SESSION['apellido_usuario']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modapellido">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>CONTACTO</th>";
            echo "<td>".$_SESSION['tel_usuario']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modtel">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>EMAIL</th>";
            echo "<td>".$_SESSION['email_usuario']."</td>";
            echo '<td><button  class="btn btn-primary" type="submit" name="modemail">Modificar</button></td>';
            echo"</tr>";
            echo"<tr>";
            echo "<th scope='row'>PERFIL</th>";
            if($_SESSION['perfil_usuario']==0){
              echo "<td>Cliente</td>";
            }else if($_SESSION['perfil_usuario']==1){
              echo "<td>Administrador</td>";
            }else{
              echo "<td>SuperAdministrador</td>";
            }
            echo '<td><button  class="btn btn-primary" type="submit" name="modperfil">Modificar</button></td>';
            echo"</tr>";
            echo "<th scope='row'>ESTADO</th>";
            if($_SESSION['estado_usuario']==0){
              echo "<td>Inactivo</td>";
              echo '<td><button  class="btn btn-primary" type="submit" name="modestado">Activar</button></td>';
            }else{
              echo "<td>Activo</td>";
              echo '<td><button  class="btn btn-primary" type="submit" name="modestado">Desactivar</button></td>';
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
      <?php if(isset($_POST['moddni'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR DNI:</label>
            <input class="form-control" type="text" name="dni" autofocus  maxlength="8"  required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviardni">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modnombre'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR NOMBRE:</label>
            <input class="form-control" type="text" name="nombre" autofocus   required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarnombre">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modapellido'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario" method="post">
          <div class="form-group">
            <label for="control">MODIFICAR APELLIDO:</label>
            <input class="form-control" type="text" name="apellido" autofocus  required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarapellido" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modtel'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario"  method="post">
          <div class="form-group">
            <label for="control">MODIFICAR NÚMERO DE CONTACTO:</label>
            <input class="form-control" type="text" name="tel"  autofocus  required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviartel" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modemail'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario"  method="post">
          <div class="form-group">
            <label for="control">MODIFICAR EMAIL:</label>
            <input class="form-control" type="email" name="email"  autofocus required>
          </div>
          <div class="form-group">
            <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarmail" id="enviar">Guardar Cambio</button>
          </div>
        </form>
      <?php elseif(isset($_POST['modperfil'])):?>
        <form action="../back/modificar_usuario2.php" name="formulario" id="formulario" method="post">
          <div class="form-group">
           <label for="control">MODIFICAR PERFIL:</label>
           <select class="form-control"  name="perfil" autofocus>
             <OPTION VALUE="0">Cliente</OPTION>
             <OPTION VALUE="1">Administrador</OPTION>
             <OPTION VALUE="1">superAdministrador</OPTION>
           </select>
          </div>
         <div class="form-group">
           <button  class="btn btn-primary btn-sm btn-block" type="submit" name="enviarperfil" id="enviar">Guardar Cambio</button>
         </div>
        </form>
      <?php elseif(isset($_POST['modestado'])):
        $usuarioexiste=0;
        $i=0;
        $archivo=fopen('../BD/usuarios.dat','a+');
          while(!feof($archivo)){
            		$linea=fgets($archivo);
                $datos=explode("|",$linea);
            		if($datos[0]==$_SESSION['dni_usuario']){
            			$usuarioexiste=1;
            			$posicion=$i;
                  $_SESSION['estado_usuario']=$datos[7];
            			break;
            		}
            		$i++;
            	}
              if($usuarioexiste==1){
                $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
                if($_SESSION['estado_usuario']==0){
                  $_SESSION['estado_usuario']=1;
                  fputs($archivo_recargar, $_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
          		    fclose($archivo_recargar);
          	      $aLineas = file("../BD/usuarios.dat");
          	      array_splice($aLineas, $posicion, 1);
          			  $archivo = fopen("../BD/usuarios.dat", "w+b");
          	      foreach( $aLineas as $linea )
          		    fwrite($archivo, $linea);
          	      fclose($archivo);
          		    echo"<script type=\"text/javascript\">alert('El usuario se ha activado con éxito.');
          			  window.location='../web/modificar_usuario.php';</script>";
                }else{
                  $_SESSION['estado_usuario']=0;
                  fputs($archivo_recargar, $_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
          		    fclose($archivo_recargar);
          	      $aLineas = file("../BD/usuarios.dat");
          	      array_splice($aLineas, $posicion, 1);
          			  $archivo = fopen("../BD/usuarios.dat", "w+b");
          	      foreach( $aLineas as $linea )
          		    fwrite($archivo, $linea);
          	      fclose($archivo);
          		    echo"<script type=\"text/javascript\">alert('El usuario se ha dado de baja con éxito.');
          			  window.location='../web/modificar_usuario.php';</script>";
                }
              }
          ?>
        </form>
        <?php endif;?>
    </div>
  </div>

</div>
</body>
<?php include "../includes/footer.php"; ?>
</html>
