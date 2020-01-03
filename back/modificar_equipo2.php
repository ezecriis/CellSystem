<?php
session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}

      $articuloexiste=0;
      $i=0;
      $archivo=fopen('../BD/equipo_venta.dat','a+');

      if(isset($_POST['enviarart'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['art_equipo']){
          			$articuloexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              $_SESSION['art_equipo']=$_POST['art'];
      		    fputs($archivo_recargar,$_POST['art']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$_SESSION['estado_equipo']."|".$_SESSION['stock_equipo']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/equipo_venta.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/equipo_venta.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
      			  window.location='../web/modificar_equipo.php';</script>";
            }
      }

      if(isset($_POST['enviartipo'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['art_equipo']){
          			$articuloexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
      		    fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_POST['tipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$_SESSION['estado_equipo']."|".$_SESSION['stock_equipo']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/equipo_venta.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/equipo_venta.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
      			  window.location='../web/modificar_equipo.php';</script>";
            }

      }
      if(isset($_POST['enviarmarca'])){
        while(!feof($archivo)){
          		$linea=fgets($archivo);
              $datos=explode("|",$linea);
          		if($datos[0]==$_SESSION['art_equipo']){
          			$articuloexiste=1;
          			$posicion=$i;
          			break;
          		}
          		$i++;
          	}
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
      		    fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_POST['marca']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$_SESSION['estado_equipo']."|".$_SESSION['stock_equipo']);
      		    fclose($archivo_recargar);
      	      $aLineas = file("../BD/equipo_venta.dat");
      	      array_splice($aLineas, $posicion, 1);
      			  $archivo = fopen("../BD/equipo_venta.dat", "w+b");
      	      foreach( $aLineas as $linea )
      		    fwrite($archivo, $linea);
      	      fclose($archivo);
      		    echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
      			  window.location='../web/modificar_equipo.php';</script>";
            }

      }

      if(isset($_POST['enviarmodelo'])){
        while(!feof($archivo)){
              $linea=fgets($archivo);
              $datos=explode("|",$linea);
              if($datos[0]==$_SESSION['art_equipo']){
                $articuloexiste=1;
                $posicion=$i;
                break;
              }
              $i++;
            }
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_POST['modelo']."|".$_SESSION['precio_equipo']."|".$_SESSION['estado_equipo']."|".$_SESSION['stock_equipo']);
              fclose($archivo_recargar);
              $aLineas = file("../BD/equipo_venta.dat");
              array_splice($aLineas, $posicion, 1);
              $archivo = fopen("../BD/equipo_venta.dat", "w+b");
              foreach( $aLineas as $linea )
              fwrite($archivo, $linea);
              fclose($archivo);
              echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
              window.location='../web/modificar_equipo.php';</script>";
            }

      }

      if(isset($_POST['enviarprecio'])){
        while(!feof($archivo)){
              $linea=fgets($archivo);
              $datos=explode("|",$linea);
              if($datos[0]==$_SESSION['art_equipo']){
                $articuloexiste=1;
                $posicion=$i;
                break;
              }
              $i++;
            }
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_POST['precio']."|".$_SESSION['estado_equipo']."|".$_SESSION['stock_equipo']);
              fclose($archivo_recargar);
              $aLineas = file("../BD/equipo_venta.dat");
              array_splice($aLineas, $posicion, 1);
              $archivo = fopen("../BD/equipo_venta.dat", "w+b");
              foreach( $aLineas as $linea )
              fwrite($archivo, $linea);
              fclose($archivo);
              echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
              window.location='../web/modificar_equipo.php';</script>";
            }

      }
      if(isset($_POST['enviarstock'])){
        while(!feof($archivo)){
              $linea=fgets($archivo);
              $datos=explode("|",$linea);
              if($datos[0]==$_SESSION['art_equipo']){
                $articuloexiste=1;
                $posicion=$i;
                break;
              }
              $i++;
            }
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$_SESSION['estado_equipo']."|".$_POST['stock']);
              fclose($archivo_recargar);
              $aLineas = file("../BD/equipo_venta.dat");
              array_splice($aLineas, $posicion, 1);
              $archivo = fopen("../BD/equipo_venta.dat", "w+b");
              foreach( $aLineas as $linea )
              fwrite($archivo, $linea);
              fclose($archivo);
              echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
              window.location='../web/modificar_equipo.php';</script>";
            }

      }
      if(isset($_POST['enviarbaja'])){
        while(!feof($archivo)){
              $linea=fgets($archivo);
              $datos=explode("|",$linea);
              if($datos[0]==$_SESSION['art_equipo']){
                $articuloexiste=1;
                $posicion=$i;
                break;
              }
              $i++;
            }
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              $estado=0;
              fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$estado."|".$_SESSION['stock_equipo']);
              fclose($archivo_recargar);
              $aLineas = file("../BD/equipo_venta.dat");
              array_splice($aLineas, $posicion, 1);
              $archivo = fopen("../BD/equipo_venta.dat", "w+b");
              foreach( $aLineas as $linea )
              fwrite($archivo, $linea);
              fclose($archivo);
              echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
              window.location='../web/modificar_equipo.php';</script>";
            }

      }
      if(isset($_POST['enviaralta'])){
        while(!feof($archivo)){
              $linea=fgets($archivo);
              $datos=explode("|",$linea);
              if($datos[0]==$_SESSION['art_equipo']){
                $articuloexiste=1;
                $posicion=$i;
                break;
              }
              $i++;
            }
            if($articuloexiste==1){
              $archivo_recargar=fopen('../BD/equipo_venta.dat','a+')or die("error");
              $estado=1;
              fputs($archivo_recargar,$_SESSION['art_equipo']."|".$_SESSION['tipo_equipo']."|".$_SESSION['marca_equipo']."|".$_SESSION['modelo_equipo']."|".$_SESSION['precio_equipo']."|".$estado."|".$_SESSION['stock_equipo']);
              fclose($archivo_recargar);
              $aLineas = file("../BD/equipo_venta.dat");
              array_splice($aLineas, $posicion, 1);
              $archivo = fopen("../BD/equipo_venta.dat", "w+b");
              foreach( $aLineas as $linea )
              fwrite($archivo, $linea);
              fclose($archivo);
              echo"<script type=\"text/javascript\">alert('El artículo se ha modificado con éxito.');
              window.location='../web/modificar_equipo.php';</script>";
            }

      }
        ?>
