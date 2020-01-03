<?php
session_start();
if($_SESSION['dni']==false){
  echo "<script>window.location='../index.php';</script>";}
  include("../PHPMailer/class.phpmailer.php");
  include("../PHPMailer/class.smtp.php");
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tel = $_POST['telefono'];
  $pass =substr( md5(microtime()), 1, 8);
  $perfil = '1';
  $estado = '1';
  $email = $_POST['email'];
  $encontro=0;
  $archivo = fopen('../BD/usuarios.dat','r') or die ("Error");
  while (!feof($archivo))
  {
    $linea = fgets($archivo);
    $datos = explode("|", $linea);

    if($datos[0] != null)
    {
      $dniBD = $datos[0];
      if ($dni == $dniBD)
      {
        $encontro = 1;
      }
    }
  }
  fclose($archivo);

  if($encontro == 1)
  {
    echo "<script> alert('El dni ya existe.');</script>";
    echo "<script> document.location.href='../web/gestion_usuario.php';</script>";
  }
  else
  {
    $archivo = fopen('../BD/usuarios.dat','a+') or die ("Error");
    fputs($archivo, $dni."|".$nombre."|".$apellido."|".$tel."|".$pass."|".$email."|".$perfil."|".$estado."\n");
    fclose($archivo);
    $mail = new PHPMailer;
    $mail->Host = "localhost";
    $mail->From = "";
    $mail->Password = "";
    $mail->FromName = "Cell System";
    $mail->Subject = "Cell System te da la bienvenida.";
    $mail->AddAddress("$email", "$nombre");
    $mail->MsgHTML("$nombre estos son tus datos para entrar a nuestra página para seguir el estado de
    la reparación de tu equipo, ingresando con tu DNI como usuario y la siguiente contraseña: $pass");
    if(!$mail->Send()){
      echo "<script>alert(\"Ah ocurrido un error al enviar el mail.\");</script>";
    }else{
      echo "<script>alert(\"Registro exitoso. Se ha enviado un mail a $email.\");</script>";
      die();
  }
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
  <h6 align="center">CLIENTES / ADMINISTRADORES</h6>
  <div  class="row bg-light">
    <h4 align="center">ADMINISTRADOR REGISTRADO</h4>
    <br>
    <table class="table">
      <thead>
        <tr class="bg-warning">
          <th scope="col">DNI</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">CONTACTO</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ESTADO</th>
        </tr>
      </thead>
      </thead>
      <tbody>
        <?php
      $_SESSION['dni_usuario'] =$dni;
      $_SESSION['nombre_usuario'] =$nombre;
      $_SESSION['apellido_usuario'] =$apellido;
          echo"<tr>";
          echo "<td>".$dni."</td>";
          echo "<td>".$nombre."</td>";
          echo "<td>".$apellido."</td>";
          echo "<td>".$tel."</td>";
          echo "<td>".$email."</td>";
          if($estado==0){
            echo "<td>Inactivo</td>";
          }else{
            echo "<td>Activo</td>";
          }
            echo"</tr>";
            echo '</tbody>
            </table>';
          echo"</tr>";
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
