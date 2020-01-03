<?php
session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}

$dnioexiste=0;
$i=0;
$archivo=fopen('../BD/equipo_cliente.dat','a+');

if(isset($_POST['pasar_listos'])){
  while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if($datos[0]==$_POST['dni_reparacion']){
          $nombre=$datos[1];
          $apellido=$datos[2];
          $tipo=$datos[3];
          $marca=$datos[4];
          $modelo=$datos[5];
          $fechaE=$datos[6];
          $fechaS=$datos[7];
          $precio=$datos[8];
          $reparacion=$datos[9];
          $estado=1;
          $dniexiste=1;
          $posicion=$i;
          break;
        }
        $i++;
      }
      if($dniexiste==1){
        $archivo_recargar=fopen('../BD/equipo_cliente.dat','a+')or die("error");
        fputs($archivo_recargar,$_POST['dni_reparacion']."|".$nombre."|".$apellido."|".$tipo."|".$marca."|".$modelo."|".$fechaE."|".$fechaS."|".$precio."|".$reparacion."|".$estado."\n");
        fclose($archivo_recargar);
        $aLineas = file("../BD/equipo_cliente.dat");
        array_splice($aLineas, $posicion, 1);
        $archivo = fopen("../BD/equipo_cliente.dat", "w+b");
        foreach( $aLineas as $linea )
        fwrite($archivo, $linea);
        fclose($archivo);
        echo"<script type=\"text/javascript\">alert('El equipo ha pasado a Listos con éxito.');
        window.location='../web/equipos_reparacion.php';</script>";
      }
}

if(isset($_POST['registrar_entrega'])){
  while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if($datos[0]==$_POST['dni_entrega']){
          $nombre=$datos[1];
          $apellido=$datos[2];
          $tipo=$datos[3];
          $marca=$datos[4];
          $modelo=$datos[5];
          $fechaE=$datos[6];
          $precio=$datos[8];
          $reparacion=$datos[9];
          $estado=2;
          $dniexiste=1;
          $posicion=$i;
          break;
        }
        $i++;
      }
      if($dniexiste==1){
        $archivo_recargar=fopen('../BD/equipo_cliente.dat','a+')or die("error");
        fputs($archivo_recargar,$_POST['dni_entrega']."|".$nombre."|".$apellido."|".$tipo."|".$marca."|".$modelo."|".$fechaE."|".$_POST['fecha_salida']."|".$precio."|".$reparacion."|".$estado."\n");
        fclose($archivo_recargar);
        $aLineas = file("../BD/equipo_cliente.dat");
        array_splice($aLineas, $posicion, 1);
        $archivo = fopen("../BD/equipo_cliente.dat", "w+b");
        foreach( $aLineas as $linea )
        fwrite($archivo, $linea);
        fclose($archivo);
        echo"<script type=\"text/javascript\">alert('Se ha registrado con exito la salida del equipo.');
        window.location='../web/equipos_reparacion.php';</script>";
      }
}




?>
