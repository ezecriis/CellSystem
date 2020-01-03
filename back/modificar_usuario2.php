<?php
session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}
      $usuarioexiste=0;
      $i=0;
      $archivo=fopen('../BD/usuarios.dat','a+');

      if(isset($_POST['enviardni'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              $_SESSION['dni_usuario']=$_POST['dni'];
      		    fputs($archivo_recargar,$_POST['dni']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }
      }

      if(isset($_POST['enviarnombre'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['dni_usuario']."|".$_POST['nombre']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }

      }
      if(isset($_POST['enviarapellido'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_POST['apellido']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }
      }
      if(isset($_POST['enviartel'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_POST['tel']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }
      }
      if(isset($_POST['enviarmail'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_POST['email']."|".$_SESSION['perfil_usuario']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }
      }
      if(isset($_POST['enviarperfil'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['dni_usuario']){
          			$usuarioexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($usuarioexiste==1){
              $archivo_recargar=fopen('../BD/usuarios.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['dni_usuario']."|".$_SESSION['nombre_usuario']."|".$_SESSION['apellido_usuario']."|".$_SESSION['tel_usuario']."|".$_SESSION['pass_usuario']."|".$_SESSION['email_usuario']."|".$_POST['perfil']."|".$_SESSION['estado_usuario']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/usuarios.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/usuarios.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El usuario se ha modificado con éxito.');
      			  window.location='../web/modificar_usuario.php';</script>";
            }
      }

        ?>
